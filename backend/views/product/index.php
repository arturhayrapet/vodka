<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_am',
            'title_ru',
            'title_en',
            'bottled',
            //'ingredient',
            //'description_am',
            //'description_ru',
            //'description_en',
            //'content_am',
            //'content_ru',
            //'content_en',
            //'image',
            //'size',
            //'degree',
            //'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
