<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/custom.css',
        'css/bootstrap.min.css',
        'css/icons/icons.min.css',
        'css/style.css',
        'css/style.min.css',
        'css/plugins.css',
        'css/colors/color-blue.css',
    ];
    public $js = [
        'js/attachments.js',
        'js/categories.js',
        'js/gallery.js',
        'js/post.js',
        'js/custom.js',
        'js/modal.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
