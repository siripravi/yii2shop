<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'language' => 'hi',
    'sourceLanguage' => 'en',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@admin'  => '@app/admin'
    ],
    'components' => [
        /*'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Mx3-M-iXODDptssVYApG8WbGG9M4Dp5Q',
        ],*/
        'assetManager' => [
            'appendTimestamp' => true,
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => array(
                    'sourcePath' => null,
                    'js' => array(
                        'https://code.jquery.com/jquery-3.2.1.min.js',
                    ),
                ),
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [],
                ],
                'yii\bootstrap\BootstrapThemeAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request' => [
            'class' => 'app\components\SiteRequest',
            'cookieValidationKey' =>'Gtwerwe34dvh90FArwre'
        ],
        'urlManager' => [
            'class' => 'app\components\SiteUrlManager',           
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'suffix' => '/',
            'rules' => [
                '' => 'site/index', 
                'image/<size:[0-9a-z\-]+>/<name>.<extension:[a-z]+>' => 'admin/image/default/index',
                '<controller:cart|podbor|info>' => '<controller>/index',
                'thankyou' => 'cart/index',
                '<action:(how|contacts|questions|reviews)>' => 'site/<action>',
                
                'file/<name>.<extension:[a-z]+>' => 'admin/image/default/file',
                'catalog/page-<page:[0-9]+>' => 'category/index',
                'catalog' => 'category/index',
                'catalog/<slug:[0-9a-z\-]+>/page-<page:[0-9]+>' => 'category/pod',
                'catalog/<slug:[0-9a-z\-]+>' => 'category/pod',
                'products/<slug:[0-9a-z\-]+>/page-<page:[0-9]+>' => 'category/view',
                'products/<slug:[0-9a-z\-]+>' => 'category/view',
                'product/<slug:[0-9a-z\-]+>' => 'product/index',
                'info/<slug:[0-9a-z\-]+>' => 'info/view',
                'popcron' => 'cron/finance',
                'sitemap.xml' => 'sitemap/index',
                'sitemap_ua.xml' => 'sitemap/ua',
                'sitemap_ru.xml' => 'sitemap/ru',
                '<slug:[0-9a-z\-]+>.html' => 'site/page',               
			],
        ],
        'db' => $db,       
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\admin\Module',
            /*'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],*/
            'modules' => [    
                //admin modules                        
                    'page' => [
                            'class' => 'admin\modules\page\Module',
                            'controllerNamespace' => 'admin\modules\page\controllers',
                            'userModel' => app\modules\user\models\User::class,
                        ],
                      /*  'language' => [
                            'class' => 'admin\modules\language\Module',
                        ],*/
                        'block' => [
                            'class' => 'admin\modules\block\Module',
                        ],
                       'products' => [
                            'class' => 'admin\modules\products\Module',
                        ],
                       /* 'modal' => [
                            'class' => 'admin\modules\modal\Module',
                        ],  */             
                        /*'sortable' => [
                            'class' => 'admin\modules\sortable\Module',
                        ], */          
                        'image' => [
                            'class' => 'admin\modules\image\Module',
                        ],
                        'slider' => [
                            'class' => 'siripravi\slideradmin\Module',
                        ],               
                 
                ],
            ],
            'slider' => [
                'class' => 'siripravi\slideradmin\Module',
            ],
            'image' => [
                'class' => 'admin\modules\image\Module',
            ],
        ],   
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
