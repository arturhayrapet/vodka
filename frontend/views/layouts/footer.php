<?php
$footer = \frontend\components\Helper::getFooter();
$social = \frontend\components\Helper::getSocial();
?>

<footer>
    <div class="footer1">
        <div class="container">
            <div class="col-md-3"><?= Yii::t('app', 'MIJNABERD') ?></div>
            <div class="col-md-3" style="padding-left: 5%;
    padding-right: 5%;"><?= $footer[0]->{'value_' . Yii::$app->language} ?></div>
            <div class="col-md-3"><?= $footer[1]->{'value_' . Yii::$app->language} ?>
                <br> <?= $footer[2]->{'value_' . Yii::$app->language} ?></div>
            <div class="col-md-3 social_links">
                <?php if ($social[0]): ?>
                    <a href="<?= $social[0]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-facebook-f"></i></a>
                <?php endIf ?>
                <?php if ($social[1]): ?>
                <a href="<?= $social[1]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-twitter"></i></a>
                <?php endIf ?>
                <?php if ($social[2]): ?>
                <a href="<?= $social[2]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-instagram"></i></a>
                <?php endIf ?>
                <?php if ($social[3]): ?>
                <a href="<?= $social[3]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-linkedin"></i></a>
                <?php endIf ?>
            </div>
        </div>
    </div>
    <div class="footer2">
        <p>2018 MIJNABERD. All right reserved </p>
    </div>
</footer>