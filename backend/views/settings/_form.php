<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\redactor\widgets\Redactor;

/* @var $this yii\web\View */
/* @var $model common\models\Settings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="settings-form">
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
        <?= $form->field($model, 'kay')->textInput(['maxlength' => true]) ?>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="am">
                <?= $form->field($model, 'value_am')->widget(Redactor::className(),[
                    'clientOptions' => [
                        'paragraphize' => false,
                    ]
                ]) ?>
            </div>
            <div class="tab-pane fade" id="ru">
                <?= $form->field($model, 'value_ru')->widget(Redactor::className(),[
                    'clientOptions' => [
                        'paragraphize' => false,
                    ]
                ]) ?>
            </div>
            <div class="tab-pane fade" id="en">
                <?= $form->field($model, 'value_en')->widget(Redactor::className(),[
                    'clientOptions' => [
                        'paragraphize' => false,
                    ]
                ]) ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>