<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile(
    '/mb_admin/js/modal.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_am')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bottled')->textInput() ?>

    <?= $form->field($model, 'ingredient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_am')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_am')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'size')->textInput() ?>

    <?= $form->field($model, 'degree')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->hiddenInput()->label(false) ?>

    <!------------------------------------- Modal -------------------------------------------------------->
    <?= $this->render('_modal', [
        'media' => $media,
    ]) ?>
    <! ------------------------------------------------------------------------ !>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
