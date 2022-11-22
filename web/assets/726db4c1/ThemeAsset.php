<?php
// DemoPagerAsset.php
namespace app\admin\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{
    public $js = [
        
    ];

    public $css = [
        /* You can add extra CSS file here if you need */
        // 'css/demopager.css'
        'css/libs.bundle.css',
        'css/theme.bundle.css'

    ];

    public $depends = [
        // we will use jQuery
       // 'yii\web\JqueryAsset'
    ];

    public function init()
    {   
        // Base path of current widget
        $this->sourcePath = __DIR__ ;
        parent::init();
    }
}
?>