<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php
    if($model->media)
        $media = [
            'attribute'=>'photo',
            'value'=> '/uploads/'.$model->media->unique_name,
            'format' => ['image',['height'=>'50']]
            ];


            else $media = 'photo';

    ?>
    <?= DetailView::widget([

        'model' => $model,
        'attributes' => [
            'id',
            'title_am',
            'title_ru',
            'title_en',
            'bottled',
            'ingredient',
            'description_am',
            'description_ru',
            'description_en',
            'content_am',
            'content_ru',
            'content_en',
            $media,
            'size',
            'degree',
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    if ($model->type == 0) {
                        return 'Product';
                    } else {
                        return 'Aromat';
                    }
                }
            ],
        ],
    ]) ?>

</div>
