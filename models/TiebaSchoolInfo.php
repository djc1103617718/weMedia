<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tieba_school_info}}".
 *
 * @property integer $id
 * @property integer $tieba_id
 * @property string $name
 * @property string $href
 * @property string $category
 * @property double $followed_num
 * @property double $post_num
 * @property string $created_time
 * @property integer $status
 */
class TiebaSchoolInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tieba_school_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tieba_id'], 'required'],
            [['tieba_id', 'status'], 'integer'],
            [['followed_num', 'post_num'], 'number'],
            [['created_time'], 'safe'],
            [['name', 'href', 'category'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tieba_id' => Yii::t('app', '拉取ID'),
            'name' => Yii::t('app', '贴吧名称'),
            'href' => Yii::t('app', '文章链接'),
            'category' => Yii::t('app', '贴类别'),
            'followed_num' => Yii::t('app', '关注量'),
            'post_num' => Yii::t('app', '回帖数'),
            'created_time' => Yii::t('app', '收录时间'),
            'status' => Yii::t('app', '状态'),
        ];
    }
}
