<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\TiebaSchoolInfo;
use app\library\HttpQuery;
use yii\base\Exception;
use yii\db\QueryBuilder;

class TiebaSchoolInfoController extends Controller
{
    private $_pullUrl = 'http://172.16.0.8:8888/tiebaInfo';

    public function actionPull()
    {
        $lastOne = TiebaSchoolInfo::find()->orderBy(['tieba_id' => SORT_DESC])->one();
        if ($lastOne) {
            $nextId = $lastOne->tieba_id + 1;
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
            //var_dump($result);die;
            $data = $result['data'];
            $keys = array_keys($data[0]);
            if ($result['code'] != 0) {
                throw new Exception('请求失败!');
            }

            $queryBuilder = new QueryBuilder($db);
            $sql = $queryBuilder->batchInsert('{{%tieba_school_info}}', $keys, $data);
            $db->createCommand($sql)->execute();
            $transaction->commit();
            return ['code' => 1];

        } catch(\Exception $e) {
            //var_dump($e->getMessage());die;
            $transaction->rollBack();
            return ['code' => 0];
        }

    }
}
