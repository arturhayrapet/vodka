<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\redactor\widgets\Redactor;

$this->registerJsFile(
    '/mb_admin/js/modal.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="">
        <ul id="myTab" class="nav nav-tabs" style="margin-left: -1px;">
            <li class="<?= Yii::$app->language == 'am' ? 'active' : '' ?>"><a href="#am"
                                                                              data-toggle="tab"><?= Yii::t('app', 'Armenian'); ?></a>
            </li>
            <li class="<?= Yii::$app->language == 'ru' ? 'active' : '' ?>"><a href="#ru"
                                                                              data-toggle="tab"><?= Yii::t('app', 'Russian'); ?></a>
            </li>
            <li class="<?= Yii::$app->language == 'en' ? 'active' : '' ?>"><a href="#en"
                                                                              data-toggle="tab"><?= Yii::t('app', 'English'); ?></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="am">
                <?= $form->field($model, 'title_am')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'caption_am')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'content_am')->widget(Redactor::className(), [
                    'clientOptions' => [
                        'paragraphize' => false,
                    ]
                ]); ?>
            </div>
            <div class="tab-pane fade" id="ru">
                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'caption_ru')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'content_ru')->widget(Redactor::className(), [
                    'clientOptions' => [
                        'paragraphize' => false,
                    ]
                ]); ?>
            </div>
            <div class="tab-pane fade" id="en">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'caption_en')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'content_en')->widget(Redactor::className(), [
                    'clientOptions' => [
                        'paragraphize' => false,
                    ]
                ]); ?>
            </div>
        </div>


        <?= $form->field($model, 'picture')->hiddenInput()->label(false) ?>


        <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'manual_date')->textInput(['maxlength' => true]) ?>


        <?= $form->field($model, 'subscribers')->checkbox() ?>


        <!------------------------------------- Modal -------------------------------------------------------->
        <?= $this->render('_modal', [
            'media' => $media,
        ]) ?>
        <! ------------------------------------------------------------------------ !>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
