<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style.css',
        'css/mobile.css',
        'fontawesome-free-5.3.1-web/css/all.css'
    ];
    public $js = [
        //'js/jquery-3.3.1.js',
        'js/custom.js',
        'bootstrap-3.3.7/dist/js/bootstrap.js',
        'fontawesome-free-5.3.1-web/js/all.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
