<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%news_resources}}".
 *
 * @property integer $id
 * @property string $media_name
 * @property string $account_name
 * @property string $href
 * @property string $title
 * @property double $read_num
 * @property string $category
 * @property string $keyword
 * @property string $release_time
 * @property integer $status
 * @property string $created_time
 */
class NewsResources extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news_resources}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['read_num'], 'number'],
            [['release_time', 'created_time'], 'safe'],
            [['status', 'news_id'], 'integer'],
            [['media_name', 'account_name', 'href', 'title', 'category', 'keyword'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'news_id' => Yii::t('app', '拉取资源的ID'),
            'media_name' => Yii::t('app', '平台名称'),
            'account_name' => Yii::t('app', '头条号'),
            'href' => Yii::t('app', '新闻链接'),
            'title' => Yii::t('app', '标题'),
            'read_num' => Yii::t('app', '阅读量'),
            'category' => Yii::t('app', '文章类别'),
            'keyword' => Yii::t('app', '关键字'),
            'release_time' => Yii::t('app', '文章发布时间'),
            'status' => Yii::t('app', '状态'),
            'created_time' => Yii::t('app', '文章收录时间'),
        ];
    }
}
