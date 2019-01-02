<?php
$footer = \frontend\components\Helper::getFooter();
$social = \frontend\components\Helper::getSocial();
?>
    <button type="button" class="btn btn-primary plusbutton hidden" data-toggle="modal" data-target="#plusModal"></button>
    <div class="modal fade" id="plusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="myModalLabel"><?= Yii::t('app', 'Are you over 18 years old?') ?></h4>
                </div>
                <div class="modal-body text-center">
                    <?= Yii::t('app', 'The content of the site is intended for viewing only to persons of legal age!') ?>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-6 text-center">
                            <a href="/site/set-age?age=yes" class="btn btn-block btn-success"
                               id="warning_button_yes"><?= Yii::t('app', 'Yes'); ?></a>
                        </div>
                        <div class="col-xs-6 text-center">
                            <a href="/site/set-age?age=no" class="btn btn-block btn-danger"
                               id="warning_button_no"><?= Yii::t('app', 'No'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer1">
            <div class="container">
                <div class="col-md-3"><?= Yii::t('app', 'MIJNABERD') ?></div>
                <div class="col-md-3" style="padding-left: 5%;
    padding-right: 5%;"><?= isset($footer[0]->value_am) ? $footer[0]->{'value_' . Yii::$app->language} : '' ?></div>
                <div class="col-md-3"><?= isset($footer[1]->value_am) ? $footer[1]->{'value_' . Yii::$app->language} : '' ?>
                    <br> <?= isset($footer[1]->value_am) ? $footer[2]->{'value_' . Yii::$app->language} : '' ?></div>
                <div class="col-md-3 social_links">
                    <?php if (isset($social[0]) && $social[0]->value_am): ?>
                        <a href="<?= $social[0]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-facebook-f"></i></a>
                    <?php endIf ?>
                    <?php if (isset($social[1]) && $social[1]->value_am): ?>
                        <a href="<?= $social[1]->{'value_' . Yii::$app->language} ?>"><i class="fab fa-twitter"></i></a>
                    <?php endIf ?>
                    <?php if (isset($social[2]) && $social[2]->value_am): ?>
                        <a href="<?= $social[2]->{'value_' . Yii::$app->language} ?>"><i
                                    class="fab fa-instagram"></i></a>
                    <?php endIf ?>
                    <?php if (isset($social[3]) && $social[3]->value_am): ?>
                        <a href="<?= $social[3]->{'value_' . Yii::$app->language} ?>"><i
                                    class="fab fa-linkedin"></i></a>
                    <?php endIf ?>
                </div>
            </div>
        </div>
        <div class="footer2">
            <p><?= date('Y') . Yii::t('app', ' MIJNABERD. All right reserved '); ?></p>
        </div>
    </footer>

<?php
if (!Yii::$app->session->get('18+')) {
    $this->registerJs("
        $('.plusbutton').click();", yii\web\View::POS_READY);
}
?>