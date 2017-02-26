<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/main.css',
        'css/fonts/fonts.css',
        'script/unslider/dist/css/unslider.css',
        'script/unslider/dist/css/unslider-dots.css'

    ];
    public $js = [
        'script/bootstrap.min.js',
        'script/TypingText.js',
        'script/jquery-circle-progress/dist/circle-progress.js',
        'script/ProgressBarUsage.js',
        'script/unslider/dist/js/unslider-min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
