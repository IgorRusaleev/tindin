<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "public/fonts/icomoon/style.css",
        "public/css/bootstrap.min.css",
        "public/css/jquery-ui.css",
        "public/css/owl.carousel.min.css",
        "public/css/owl.theme.default.min.css",
        "public/css/owl.theme.default.min.css",
        "public/css/jquery.fancybox.min.css",
        "public/css/bootstrap-datepicker.css",
        "public/fonts/flaticon/font/flaticon.css",
        "public/css/aos.css",
        "public/css/jquery.mb.YTPlayer.min.css",
        "public/css/style.css",
    ];

    public $js = [
        "public/js/jquery-3.3.1.min.js",
        "public/js/jquery-migrate-3.0.1.min.js",
        "public/js/jquery-ui.js",
        "public/js/popper.min.js",
        "public/js/bootstrap.min.js",
        "public/js/owl.carousel.min.js",
        "public/js/jquery.stellar.min.js",
        "public/js/jquery.countdown.min.js",
        "public/js/bootstrap-datepicker.min.js",
        "public/js/jquery.easing.1.3.js",
        "public/js/aos.js",
        "public/js/jquery.fancybox.min.js",
        "public/js/jquery.sticky.js",
        "public/js/jquery.mb.YTPlayer.min.js",
        "public/js/main.js",
    ];
    public $depends = [

    ];
}
