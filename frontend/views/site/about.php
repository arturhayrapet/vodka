<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1 style="text-align: center"><?= Yii::t('app', 'About Us') ?></h1>
    <p class="about_desc"><?= isset($about[0]) ? $about[0]->{'value_' . Yii::$app->language} : '' ?></p>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-xs-12">
                <?php if (isset($about[4])): ?>
                    <img src="<?= $about[4]->{'value_' . Yii::$app->language} ?>" alt="About" width="100%">
                <?php endif; ?>
            </div>
            <div class="col-md-7 col-xs-12">
                <hr class="abour_hr1">
                <p><?= isset($about[1]) ? $about[1]->{'value_' . Yii::$app->language} : '' ?></p>
                <hr class="abour_hr2">
                <p><?= isset($about[2]) ? $about[2]->{'value_' . Yii::$app->language} : '' ?></p>
                <hr class="abour_hr3">
                <p><?= isset($about[3]) ? $about[3]->{'value_' . Yii::$app->language} : '' ?></p>
            </div>
        </div>
    </div>
</div>
