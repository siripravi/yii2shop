<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$cartItemCount = 1;//$this->params['cartItemCount'];

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- //header modal -->
	
	
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-expand-lg navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        [
            'label' => 'Cart <span id="cart-quantity" class="badge badge-danger">' . $cartItemCount . '</span>',
            'url' => ['/cart/index'],
            'encode' => false
        ],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Catalog', 'url' => ['/catalog/list']];
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => Yii::$app->user->identity->getDisplayName(),
//            'dropDownOptions' => [
//                'class' => 'dropdown-menu-right'
//            ],
            'items' => [
                [
                    'label' => 'Profile',
                    'url' => ['/profile/index'],
                ],
                [
                    'label' => 'Logout',
                    'url' => ['/site/logout'],
                    'linkOptions' => [
                        'data-method' => 'post'
                    ],
                ]
            ]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    echo abcms\multilanguage\widgets\LanguageBar::widget();
    NavBar::end();
    ?>

  
        <!-- //header modal -->
	
	<!-- header -->
	<div class="header" id="home1">
		<div class="container">
			<div class="w3l_login">
				<a href="#" data-toggle="modal" data-target="#myModal88"><span class="fa fa-user" aria-hidden="true"></span></a>
			</div>
			<div class="w3l_logo">
				<h1><?=Html::a('Electronic Store<span>Your stores. Your place.</span>', ['site/index']) ?></h1>
			</div>
			<div class="search">
				<input class="search_box" type="checkbox" id="search_box">
				<label class="icon-search" for="search_box"><span class="fa fa-search" aria-hidden="true"></span></label>
				<div class="search_form">
					<?= Html::beginForm(['catalog/list'], 'get') ?>
						<input type="text" name="gsearch" placeholder="Search..."><input type="submit" name="_search_prod" value="Find">
					<?= Html::endForm(); ?>
				</div>
			</div>
			<div class="cart cart box_1"> 
				<?=Html::a('<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>', ['cart/index']) ?>
			</div>  
		</div>
	</div>
	<!-- //header -->
          <div class="container">
          <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            </div>

            <div class="col text-right">
                <p class="pull-right">Created by <a href="https://youtube.com/TheCodeholic" target="_blank">TheCodeholic</a></p>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
