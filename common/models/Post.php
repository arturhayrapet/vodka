<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title_am
 * @property string $title_ru
 * @property string $title_en
 * @property string $caption_am
 * @property string $caption_ru
 * @property string $caption_en
 * @property string $content_am
 * @property string $content_ru
 * @property string $content_en
 * @property string $picture
 * @property string $type
 * @property string $subscribers
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function getMedia()
    {
        return $this->hasOne(Media::className(), ['id' => 'picture']);
    }

    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_am', 'caption_am', 'content_am'], 'required'],
            [['content_am', 'content_ru', 'content_en'], 'string'],
            [['subscribers'], 'safe'],
            [['title_am', 'title_ru', 'title_en', 'caption_am', 'caption_ru', 'caption_en', 'picture', 'type'], 'string', 'max' => 255],
        ];
    }

    public function sendEmail()
    {

        $subscribers = Subscribers::find()->where(['active' => 1])->all();
        $mess = '
                <h2>' . $this->title_am . '</h2>' . $this->caption_am . ' <br />
                <a href="http://mijnaberd.loc/site/post/' . $this->id . '"> 
                ավելին
                </a>)';
        foreach ($subscribers as $subscriber) {
            Yii::$app->mailer->compose()
                ->setTo($subscriber->email)
                ->setFrom([Yii::$app->params['adminEmail'] => 'Միջնաբերդ'])
                ->setSubject('Միջնաբերդ Նորություններ')
                ->setHtmlBody($mess)
                ->send();
        }

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
            'caption_am' => Yii::t('app', 'Caption Am'),
            'caption_ru' => Yii::t('app', 'Caption Ru'),
            'caption_en' => Yii::t('app', 'Caption En'),
            'content_am' => Yii::t('app', 'Content Am'),
            'content_ru' => Yii::t('app', 'Content Ru'),
            'content_en' => Yii::t('app', 'Content En'),
            'picture' => Yii::t('app', 'Picture'),
            'type' => Yii::t('app', 'Type'),
            'subscribers' => Yii::t('app', 'Subscribers'),
        ];
    }
}
