<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Media');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Media'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'img',
            'title_am',
            'title_ru',
            'title_en',
            //'description_am:ntext',
            //'description_ru:ntext',
            //'description_en:ntext',
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    if ($model->type == 1) {
                        return 'Slider1';
                    } elseif ($model->type == 2) {
                        return 'Slider2';
                    } elseif ($model->type == 3) {
                        return 'Gallery';
                    } else {
                        return 'Not set';
                    }
                }
            ],
            [
                'attribute' => 'unique_name',
                'value' => function ($model) {
                    return '/uploads/'.$model->unique_name;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
