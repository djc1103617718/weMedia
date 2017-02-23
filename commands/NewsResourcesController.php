<?php

namespace app\commands;

use Yii;
use yii\base\Exception;
use yii\console\Controller;
use app\commands\models\NewsResources;
use app\library\HttpQuery;
use yii\db\QueryBuilder;

class NewsResourcesController extends Controller
{
    private $_pullUrl = 'http://172.16.0.8:8888/wemedia';

    public function actionPull()
    {
        $lastOne = NewsResources::find()->orderBy(['news_id' => SORT_DESC])->one();
        if ($lastOne) {
            $nextId = $lastOne->news_id + 1;
        } else {
            $nextId = 1;
        }
        $url = $this->_pullUrl . '?id=' . $nextId;

        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();

        try {
            $result = HttpQuery::getQuickCurlQuery($url);
            if (!$result) {
                throw new Exception('请求失败!');
            }
            $result = json_decode($result, true);
            $data = $result['data'];
            $keys = array_keys($data[0]);
            if ($result['code'] != 0) {
                throw new Exception('请求失败!');
            }

            $queryBuilder = new QueryBuilder($db);
            $sql = $queryBuilder->batchInsert('{{%news_resources}}', $keys, $data);
            $db->createCommand($sql)->execute();
            $transaction->commit();
            return true;

        } catch(\Exception $e) {
            $transaction->rollBack();
            return false;
        }

    }
}
