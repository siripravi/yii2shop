<?php

namespace app\admin;
use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\admin\controllers';

    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

    /* Yii::$app->assetManager->bundles['yii\bootstrap5\BootstrapAsset'] = [
            'basePath'   => '@web',
           // 'sourcePath' => [],
           // 'css'        => ['css/styles.css'],
            'js'  => []
        ];

        Yii::$app->assetManager->bundles[]= [ 
	      // 'deyraka\materialdashboard\web\MaterialDashboardAsset',
	
	  ];*/
    }

}
