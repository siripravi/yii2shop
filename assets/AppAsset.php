<?php
namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/dist';
    public $css = [
        // 'css/all.css'    //YII_ENV_DEV ?  YII_ENV_DEV ?
         'css/style.css'
    ];
    public $js = [
        'js/all.js'    // YII_ENV_DEV ? : 'js/all.min.js'
    ];
}

