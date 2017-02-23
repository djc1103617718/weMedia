<?php

namespace app\components\searchWidget;

use yii\base\View;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class SearchAsset extends AssetBundle
{
    //const WIDGET_PATH= __DIR__ . '/web/';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
    ];
    public $js = [

        //'js/bootstrap.min.js',
        //'js/dropdown.js'
    ];
    public $jsOptions = [
        'position'=>\yii\web\View::POS_END
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];

    /**
     * 定义按需加载JS方法，注意加载顺序在最后
     * @param $view
     * @param $jsfile
     */
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [SearchAsset::className(), 'depends' => '']);
    }
}
