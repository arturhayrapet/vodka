<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property int $id
 * @property string $img
 * @property string $title_am
 * @property string $title_ru
 * @property string $title_en
 * @property string $description_am
 * @property string $description_ru
 * @property string $description_en
 * @property int $type
 * @property string $unique_name
 * @property string $oldLink
 */
class Media extends \yii\db\ActiveRecord
{
    public  $oldLink;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['img' , 'required' ,
                'when' => function($model){ return $model->oldLink == null;},
                'whenClient' => "function (attribute, value) { return $('#products-oldLink').val() == ''; }"],
            [['title_am','description_am'],'required'],
            [['description_am', 'description_ru', 'description_en'], 'string'],
            [['type'], 'integer'],
            [['title_am', 'title_ru', 'title_en', 'unique_name'], 'string', 'max' => 255],
            [['img'], 'file'],
            [['oldLink'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */

//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//         $this->unique_name = 'f'.time();
//            return true;
//        }
//        return false;
//    }

    public function getImageurl()
    {
        return \Yii::$app->homeUrl.'uploads/'.$this->unique_name;
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Img'),
            'title_am' => Yii::t('app', 'Title Am'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_en' => Yii::t('app', 'Title En'),
            'description_am' => Yii::t('app', 'Description Am'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_en' => Yii::t('app', 'Description En'),
            'type' => Yii::t('app', 'Type'),
            'unique_name' => Yii::t('app', 'Unique Name'),
            'oldLink' => Yii::t('app', 'Unique Name'),

        ];
    }
}
