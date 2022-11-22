<?php

namespace app\admin\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'fonts/themify-icons/themify-icons.css',    
       // 'css/libs.bundle.css' ,
       
    ];
    public $js = [  
      //  'js/libs.bundle.js' ,       // 'js/theme.bundle.js',
       
    ];
    public $depends = [
        'yii\web\YiiAsset',
		'yii\bootstrap5\BootstrapAsset'
        
    ];
    public function init()
    {   
        // Base path of current widget
        $this->sourcePath = __DIR__ ;
        parent::init();
    }
}