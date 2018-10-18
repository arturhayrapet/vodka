<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subscribers".
 *
 * @property int $id
 * @property int $active
 * @property string $email
 * @property string $token
 */
class Subscribers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscribers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['email'], 'required'],
            [['email'], 'unique'],
            [['email'], 'email'],
            [['token'], 'string'],
            [['email'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'active' => Yii::t('app', 'Active'),
            'email' => Yii::t('app', 'Email'),
            'token' => Yii::t('app', 'Token'),
        ];
    }
    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail()
    {
        return Yii::$app->mailer->compose()
            ->setTo($this->email)
            ->setFrom([Yii::$app->params['adminEmail'] => 'Միջնաբերդ'])
            ->setSubject('Միջնաբերդ')
            ->setHtmlBody('Շնորհակալություն բաժանորդագրվելու համար, անցեք ')
            ->send();
    }
}
