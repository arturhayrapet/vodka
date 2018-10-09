<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Media */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="media-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'img')->fileInput() ?>
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
                <?= $form->field($model, 'description_am')->widget(\yii\redactor\widgets\Redactor::className()) ?>
            </div>
            <div class="tab-pane fade" id="ru">
                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description_ru')->widget(\yii\redactor\widgets\Redactor::className()) ?>
            </div>
            <div class="tab-pane fade" id="en">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description_en')->widget(\yii\redactor\widgets\Redactor::className()) ?>
            </div>
        </div>


        <?= $form->field($model, 'type')->dropDownList([1 => 'slider1', 2 => 'slider2', 3 => 'gallery'], ['prompt' => 'choose type ...']) ?>

        <?= $form->field($model, 'oldLink')->hiddenInput()->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
