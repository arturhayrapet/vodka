<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title_am
 * @property string $title_ru
 * @property string $title_en
 * @property string $bottled
 * @property string $ingredient
 * @property string $description_am
 * @property string $description_ru
 * @property string $description_en
 * @property string $content_am
 * @property string $content_ru
 * @property string $content_en
 * @property string $image
 * @property int $size
 * @property int $degree
 * @property string $type
 */

class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function getMedia()
    {
        return $this->hasOne(Media::className(), ['id' => 'image']);
    }

    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_am','description_am','content_am', 'image'],'required'],
            [['bottled'], 'safe'],
            [['size', 'degree'], 'integer'],
            [['title_am', 'title_ru', 'title_en', 'ingredient', 'description_am', 'description_ru', 'description_en', 'content_am', 'content_ru', 'content_en', 'image', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_am' => Yii::t('app', 'Title Am'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_en' => Yii::t('app', 'Title En'),
            'bottled' => Yii::t('app', 'Bottled'),
            'ingredient' => Yii::t('app', 'Ingredient'),
            'description_am' => Yii::t('app', 'Description Am'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_en' => Yii::t('app', 'Description En'),
            'content_am' => Yii::t('app', 'Content Am'),
            'content_ru' => Yii::t('app', 'Content Ru'),
            'content_en' => Yii::t('app', 'Content En'),
            'image' => Yii::t('app', 'Image'),
            'size' => Yii::t('app', 'Size'),
            'degree' => Yii::t('app', 'Degree'),
            'type' => Yii::t('app', 'Type'),
        ];
    }
}
