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
class OldAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      // '//unicons.iconscout.com/release/v4.0.0/css/line.css',        
      // 'css/Style1.css'
    ];
    public $js = [
       // '//code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js',
        //'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
        'app\assets\ExampleAsset'
    ];

    public function setCSSJSFiles($css,$js)
   {
    $this->css = array($css);        
    $this->js = array($js);
   }
  
}
