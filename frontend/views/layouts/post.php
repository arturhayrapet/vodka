<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$menus = \frontend\components\Helper::getMenus();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<header class="post_header">
    <div class="container example5">
        <nav class="navbar navbar-default custom_navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed custom_navbar-toggle" data-toggle="collapse"
                            data-target="#navbar5">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img style="	width: 110px; margin-top: 15px;" src="/images/logo_white.png"
                                                          alt="logo">
                    </a>
                </div>
                <div id="navbar5" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right" style=" margin-right: 100px;">
                        <?php foreach ($menus as $menu): ?>
                            <li><a href="<?= $menu->url ?>"><?= $menu->{'name_' . Yii::$app->language} ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!--/.nav-collapse -->
                <div class="languages">
                    <a href="/am/<?= Yii::$app->request->queryString ? Yii::$app->request->getPathInfo() . '?' . Yii::$app->request->queryString : Yii::$app->request->getPathInfo() ?>">am</a>
                    /
                    <a href="/ru/<?= Yii::$app->request->queryString ? Yii::$app->request->getPathInfo() . '?' . Yii::$app->request->queryString : Yii::$app->request->getPathInfo() ?>">ru</a>
                    /
                    <a href="/en/<?= Yii::$app->request->queryString ? Yii::$app->request->getPathInfo() . '?' . Yii::$app->request->queryString : Yii::$app->request->getPathInfo() ?>">en</a>
                </div>
            </div>
            <!--/.container-fluid -->
        </nav>

    </div>
</header>
<?= $content ?>
<?= $this->render('footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
