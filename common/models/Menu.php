<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name_am
 * @property string $name_en
 * @property string $name_ru
 * @property string $type
 * @property int $type_id
 * @property string $url
 * @property int $position
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_am', 'url', 'position' ],'required'],
            [['type_id','position'], 'integer'],
            [['name_am', 'name_en', 'name_ru', 'type', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_am' => Yii::t('app', 'Name Am'),
            'name_en' => Yii::t('app', 'Name En'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'type' => Yii::t('app', 'Type'),
            'type_id' => Yii::t('app', 'Type ID'),
            'url' => Yii::t('app', 'Url'),
            'position' => Yii::t('app','Position')
        ];
    }
}
