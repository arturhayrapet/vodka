<?php
$footer = \frontend\components\Helper::getFooter();
$social = \frontend\components\Helper::getSocial();
?>

<footer>
    <div class="footer1">
        <div class="container">
            <div class="col-md-3"><?= Yii::t('app', 'MIJNABERD') ?></div>
            <div class="col-md-3" style="padding-left: 5%;
    padding-right: 5%;"><?= $footer[0]->value_am ? $footer[0]->{'value_' . Yii::$app->language} : '' ?></div>
            <div class="col-md-3"><?= $footer[1]->value_am ? $footer[1]->{'value_' . Yii::$app->language} : '' ?>
                <br> <?= $footer[2]->value_am ? $footer[2]->{'value_' . Yii::$app->language} : '' ?></div>
            <div class="col-md-3 social_links">
                <?php if (isset($social[0]) && $social[0]->value_am): ?>
                    <a href="<?= $social[0]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-facebook-f"></i></a>
                <?php endIf ?>
                <?php if (isset($social[1]) && $social[1]->value_am): ?>
                    <a href="<?= $social[1]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-twitter"></i></a>
                <?php endIf ?>
                <?php if (isset($social[2]) && $social[2]->value_am): ?>
                    <a href="<?= $social[2]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-instagram"></i></a>
                <?php endIf ?>
                <?php if (isset($social[3]) && $social[3]->value_am): ?>
                    <a href="<?= $social[3]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-linkedin"></i></a>
                <?php endIf ?>
            </div>
        </div>
    </div>
    <div class="footer2">
        <p><?= date('Y').Yii::t('app',' MIJNABERD. All right reserved ');?></p>
    </div>
</footer>