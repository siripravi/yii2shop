<?php
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;
?>
<?php
        NavBar::begin([
            'brandLabel' => '<span class="gaozhan-logo"></span>Nyxta',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-lg navbar-red',
                //'style'=>"background-color: #e3f2fd;"
            ],
        ]);

        $menuItems = [
            [
                'label' => Html::tag('span', Yii::t('app', 'Products')),
                'encode' => false,
                'url' => ['/'],
                'linkOptions' => ['alt' => Yii::t('app', 'Featured projects'), 'title' => Yii::t('app', 'Featured projects')],
            ],           
           
           /* [
                'label' => Yii::t('app', 'Top {n}', ['n' => Yii::$app->params['project.maxTopProjects']]),
                'url' => ['/project/top-projects'],
            ]*/
        ];
        /*$menuItems[] = [
            'label' => Html::tag('span', '<span> ' . Yii::t('app', 'RSS feed') . '</span>', ['class' => 'fa fa-rss-square']),
            'encode' => false,
            'url' => ['/project/rss'],
            'linkOptions' => [
                'alt' => Yii::t('app', 'RSS feed'),
                'title' => Yii::t('app', 'RSS feed'),
            ]
        ]*/
        ?>
        <?= Nav::widget([
            'options' => ['class' => 'navbar-nav mr-auto mb-2 mb-lg-0'],
            'items' => $menuItems,
        ]); ?>
        <?php       $menuItems = [];
       
        $menuItems[] = [
            'label' => Yii::t('app', 'SHOP NOW'),
            'url' => ['/'],
            'linkOptions' => ['class' => 'btn-add-project']
        ];
        ?>
        <?= Nav::widget([
            'options' => ['class' => 'col-lg-auto text-center text-lg-left header-item-holder'],
            'items' => $menuItems,
        ]); ?>

        <?php NavBar::end(); ?>
