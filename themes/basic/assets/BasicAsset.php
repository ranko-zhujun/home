<?php


namespace app\themes\basic\assets;


use yii\web\AssetBundle;
use yii\web\View;

class BasicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/basic/css/bootstrap.min.css',
        'themes/basic/fonts/line-icons.css',
        'themes/basic/css/slicknav.css',
        'themes/basic/css/ion.rangeSlider.css',
        'themes/basic/css/ion.rangeSlider.skinFlat.css',
        'themes/basic/css/nivo-lightbox.css',
        'themes/basic/css/animate.css',
        'themes/basic/css/owl.carousel.css',
        'themes/basic/extras/settings.css',
        'themes/basic/extras/layers.css',
        'themes/basic/extras/navigation.css',
        'themes/basic/plugins/fontawesome-free/css/all.min.css',
        'themes/basic/css/main.css',
        'themes/basic/css/responsive.css',
        'themes/basic/css/custom.css'
    ];

    public $js = [
        'themes/basic/js/jquery-min.js',
        'themes/basic/js/popper.min.js',
        'themes/basic/js/bootstrap.min.js',
        'themes/basic/js/jquery.mixitup.js',
        'themes/basic/js/jquery.counterup.min.js',
        'themes/basic/js/ion.rangeSlider.js',
        'themes/basic/js/jquery.parallax.js',
        'themes/basic/js/waypoints.min.js',
        'themes/basic/js/wow.js',
        'themes/basic/js/owl.carousel.min.js',
        'themes/basic/js/jquery.slicknav.js',
        'themes/basic/js/nivo-lightbox.js',
        'themes/basic/js/jquery.slicknav.js',
        'themes/basic/js/main.js',
        'themes/basic/js/form-validator.min.js',
        'themes/basic/js/contact-form-script.min.js',
        'themes/basic/js/jquery.themepunch.tools.min.js',
        'themes/basic/js/jquery.themepunch.revolution.min.js',
        'themes/basic/js/extensions/revolution.extension.actions.min.js',
        'themes/basic/js/extensions/revolution.extension.carousel.min.js',
        'themes/basic/js/extensions/revolution.extension.kenburn.min.js',
        'themes/basic/js/extensions/revolution.extension.layeranimation.min.js',
        'themes/basic/js/extensions/revolution.extension.migration.min.js',
        'themes/basic/js/extensions/revolution.extension.navigation.min.js',
        'themes/basic/js/extensions/revolution.extension.parallax.min.js',
        'themes/basic/js/extensions/revolution.extension.slideanims.min.js',
        'themes/basic/js/extensions/revolution.extension.video.min.js'
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
    public $depends = [

    ];

}