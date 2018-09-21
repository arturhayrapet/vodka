<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $kay
 * @property string $value_am
 * @property string $value_ru
 * @property string $value_en
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kay','value_am'],'required'],
            [['kay', 'value_am', 'value_ru', 'value_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kay' => Yii::t('app', 'Kay'),
            'value_am' => Yii::t('app', 'Value Am'),
            'value_ru' => Yii::t('app', 'Value Ru'),
            'value_en' => Yii::t('app', 'Value En'),
        ];
    }
}
