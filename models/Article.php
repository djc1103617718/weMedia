<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $media_id
 * @property integer $admin_id
 * @property integer $category
 * @property string $content
 * @property integer $status
 * @property integer $created_at
 * @property integer $update_at
 */
class Article extends \yii\db\ActiveRecord
{
    const STATUS_NORMAL = 1;
    const STATUS_FAILURE = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'admin_id', 'category', 'content'], 'required'],
            [['media_id', 'admin_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['title', 'category'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', '文章标题'),
            'description' => Yii::t('app', '文章简述'),
            'media_id' => Yii::t('app', '参考的文章ID'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'category' => Yii::t('app', '文章类别'),
            'content' => Yii::t('app', '内容详情'),
            'status' => Yii::t('app', '状态'),
            'created_at' => Yii::t('app', '创建时间'),
            'updated_at' => Yii::t('app', '更新时间'),
        ];
    }

    public function edit()
    {
        $this->admin_id = Yii::$app->user->id;
        $this->status = self::STATUS_NORMAL;
        return $this->save();
    }
}
