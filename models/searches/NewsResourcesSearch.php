<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NewsResources;

/**
 * NewsResourcesSearch represents the model behind the search form about `app\models\NewsResources`.
 */
class NewsResourcesSearch extends NewsResources
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['media_name', 'account_name', 'href', 'title', 'category', 'keyword', 'release_time', 'created_time'], 'safe'],
            [['read_num'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public static function searchAttributes()
    {
        return [
            '平台名称' => 'media_name',
            '头条号' => 'account_name',
            '标题' => 'title',
            '类别' => 'category',
            '关键字' => 'keyword',
            '阅读量' => 'read_num',
            '文章发布时间' => 'release_time'
        ] ;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = NewsResources::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'read_num' => $this->read_num,
            'release_time' => $this->release_time,
            'status' => $this->status,
            'created_time' => $this->created_time,
        ]);

        $query->andFilterWhere(['like', 'media_name', $this->media_name])
            ->andFilterWhere(['like', 'account_name', $this->account_name])
            ->andFilterWhere(['like', 'href', $this->href])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'keyword', $this->keyword]);

        return $dataProvider;
    }
}
