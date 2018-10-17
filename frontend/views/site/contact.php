<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
$social = \frontend\components\Helper::getSocial();
$footer = \frontend\components\Helper::getFooter();
?>
    <div id="map_contact"></div>
    <div class="site-contact container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <h1><?= Yii::t('app','Contact form')?></h1>
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Title']) ?>
                <div class="col-md-6" style="padding-left: 0">
                    <?= $form->field($model, 'email')->textInput(['type' => 'email', 'placeholder' => 'Your email address']) ?>
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Your first name']) ?>
                </div>
                <div class="col-md-6" style="padding-right: 0">
                    <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder' => 'text']) ?>
                </div>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary contact_form_btn', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="information">
                    <p class="inform_title"><?= Yii::t('app', 'Contact information') ?></p>
                    <div class="contact_info">
                        <p>
                            <i class="fas fa-location-arrow contact_icons"></i><?= $footer[0]->{'value_' . Yii::$app->language} ?>
                        </p>
                        <p>
                            <i class="fas fa-envelope contact_icons"></i><?= $footer[2]->{'value_' . Yii::$app->language} ?>
                        </p>
                        <p><i class="fas fa-phone contact_icons"></i><?= $footer[1]->{'value_' . Yii::$app->language} ?>
                        </p>
                    </div>
                    <div class="social_links">
                        <?php if ($social[0]): ?>
                            <a href="<?= $social[0]->{'value_' . Yii::$app->language} ?>"><i
                                        class="fab fa-facebook-f"></i></a>
                        <?php endIf ?>
                        <?php if ($social[1]): ?>
                            <a href="<?= $social[1]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-twitter"></i></a>
                        <?php endIf ?>
                        <?php if ($social[2]): ?>
                            <a href="<?= $social[2]->{'value_' . Yii::$app->language} ?>"><i
                                        class="fab fa-instagram"></i></a>
                        <?php endIf ?>
                        <?php if ($social[3]): ?>
                            <a href="<?= $social[3]->{'value_' . Yii::$app->language} ?>"
                               style="    margin-right: 0;"><i class="fab fa-linkedin"></i></a>
                        <?php endIf ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $this->registerJsFile(
    "http://maps.googleapis.com/maps/api/js?key=AIzaSyB4qW1Bs0GS8BpufPkYby0x2Em5UbL8CUM&callback=initMap", ['depends' => \yii\web\JqueryAsset::className()]
)
?>

<?php $this->registerJsFile(
    "/js/map_contact.js", ['depends' => \yii\web\JqueryAsset::className()]
)
?>