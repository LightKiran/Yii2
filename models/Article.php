<?php

namespace app\models;

use Yii;
use \yii\behaviors\TimestampBehavior;
use \yii\behaviors\BlameableBehavior;
use \yii\behaviors\SluggableBehavior;
use \yii\helpers\Html;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property string $body
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 *
 * @property ArticleUser $createdBy
 */
class Article extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'article';
    }

    // array behavious are special classes which is something functionality to
    // the class or the fields of the class so
    // 
    public function behaviors() {
        return [
            //::className() or class()
// responsible for to update created at and update at follow class for more information           
            TimestampBehavior::className(),
            [
                'class' => BlameableBehavior::className(),
                // responsible for who created it
                'updatedByAttribute' => false
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    // if page is not redirect properly make all required field is filled
    public function rules() {
        return [
            [['title', 'body'], 'required'],
            [['id', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['body'], 'string'],
            [['title', 'slug'], 'string', 'max' => 1024],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleUser::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy() {
        return $this->hasOne(ArticleUser::className(), ['id' => 'created_by']);
    }

    public function getEncodedBody() {
//         return Html::encode($model->body);
//        return \yii\helpers\Html::encode($this->body);
        return Html::encode($this->body);
    }

}
