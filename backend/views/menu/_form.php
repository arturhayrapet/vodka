<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

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
                <?= $form->field($model, 'name_am')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="tab-pane fade" id="ru">
                <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="tab-pane fade" id="en">
                <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'position')->dropDownList(['0' => 'top']) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
