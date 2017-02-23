<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TiebaSchoolInfo;

/**
 * TiebaSchoolInfoSearch represents the model behind the search form about `app\models\TiebaSchoolInfo`.
 */
class TiebaSchoolInfoSearch extends TiebaSchoolInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tieba_id', 'status'], 'integer'],
            [['name', 'href', 'category', 'created_time'], 'safe'],
            [['followed_num', 'post_num'], 'number'],
        ];
    }

    public static function searchAttributes()
    {
        return [
            '贴吧名称' => 'name',
            '类别' => 'category',
            '关注量' => 'followed_num',
            '回帖数' => 'post_num',
            '收入时间' => 'created_time'
        ] ;
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
        $query = TiebaSchoolInfo::find();

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
            'tieba_id' => $this->tieba_id,
            'followed_num' => $this->followed_num,
            'post_num' => $this->post_num,
            'created_time' => $this->created_time,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'href', $this->href])
            ->andFilterWhere(['like', 'category', $this->category]);

        return $dataProvider;
    }
}
