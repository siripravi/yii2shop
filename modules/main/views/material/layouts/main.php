<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\FontAwesomeAsset;
use app\assets\SiteAsset;
use yii\bootstrap5\Carousel;
use app\modules\main\models\Question;
use app\modules\main\models\Review;
use app\modules\main\models\Slide;
use yii\bootstrap5\Breadcrumbs;
use common\modules\cart\widgets\CartWidget;
use app\modules\main\widgets\OrderScheme;
use common\modules\modal\Modal;
use common\modules\page\models\Page;
use common\modules\products\models\Category;
use kartik\typeahead\Typeahead;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\Menu;
use kartik\icons\Icon;


use app\modules\main\components\Nav;
$asset = SiteAsset::register($this);
FontAwesomeAsset::register($this);

$this->registerLinkTag(['rel' => 'canonical', 'href' => Url::to((Yii::$app->language === 'en' ? '/en' : null) . explode('?', Yii::$app->request->url)[0], true)]);

$this->registerLinkTag(['rel' => 'alternate', 'hreflang' => 'en-UA', 'href' => Url::current(['lang' => 'en'], 'https')]);
$this->registerLinkTag(['rel' => 'alternate', 'hreflang' => 'ru-UA', 'href' => Url::current(['lang' => 'ru'], 'https')]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
<link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
<?php $this->head() ?>
</head>
<body class="blog-author bg-gray-200">
<?php $this->beginBody() ?>
<?php $cartItemCount = 8;?>

<div class="page-loader loader">
        <div class="cmps">
            <span class="mt-4 mx-auto d-block text-center">
                Loading<b></b><b></b><b></b>
            </span>
        </div>
</div>
<header class="header">
    <div class="container">
        <section class="header--main">
            <div class="mobile-menu">
                <input id="menu__toggle" class="open-nav" type="checkbox" />
                <label class="menu__btn" class="open" for="menu__toggle">
                    <span></span>
                </label>
            </div>
            <div class="header--logo">
                <a href="index.html"><?= Html::img('/public/img/light-logo.png',['class' => 'nav-logo']);?>
                </a>                    
            </div>
<nav class="navbar navbar-expand-lg navbar-light menu js-menu ">
	
	<?php
                    $items = [
                        [
                            'label' => Yii::t('app', 'Home'),
                            'url' => ['/'],
							'options' => ['class'=>'menu-item'],
                            'active' => in_array(Yii::$app->controller->id, ['site']) && in_array(Yii::$app->controller->action->id, ['index']),
                            /*'linkOptions' => [
                                'class' => in_array(Yii::$app->controller->id, ['site']) && in_array(Yii::$app->controller->action->id, ['index']) ? 'nav-item nav-link ml-3' : 'nav-item nav-link',
                            ],*/
                        ],
                        [
                            'label' => Yii::t('app', 'Catalog'),
                            'url' => ['/category/index'],
							'options' => ['class'=>'menu-item'],
                            'active' => in_array(Yii::$app->controller->id, ['category', 'product']),
                        ],
                       /* ['label' => Yii::t('app', 'Find product'), 
						'url' => ['/podbor/index'],
						'options' => ['class'=>'menu-item'],
						],
                        ['label' => Yii::t('app', 'How to order'), 'url' => ['/site/how'],
						'options' => ['class'=>'menu-item']],
                        ['label' => Yii::t('app', 'Questions and answers'), 'url' => ['/site/questions'],
						'options' => ['class'=>'menu-item']
						],*/                   
                        ['label' => Yii::t('app', 'Contacts'), 'url' => ['/site/contacts'],
						'options' => ['class'=>'menu-item']],
                        ['label' => Yii::t('app', 'Reviews'), 'url' => ['/site/reviews'],
						'options' => ['class'=>'menu-item']],
						
                    ];
					if (Yii::$app->user->isGuest) {
        $items[] = ['label' => 'Signup', 'url' => ['/site/signup'],'options' => ['class'=>'menu-item']];
        $items[] = ['label' => 'Login', 'url' => ['/site/login'],'options' => ['class'=>'menu-item']];
    } else {
        $items[] = [
            'label' => '<i class="uil uil-user user"></i>',//Yii::$app->user->identity->getDisplayName(),
			'options' => ['class'=>'menu-item'],
            'dropDownOptions' => [
                'class' => 'sub-menu'
            ],
            'items' => [
                [
                    'label' => 'Profile',
                    'url' => ['/profile/index'], 'options' => ['class'=>'menu-item menu-item-child'],
					'linkOptions' => [
                       'class'=>'sub-menu-item'
                    ],
                ],
                [
                    'label' => 'Logout',
                    'url' => ['/site/logout'],
					'options' => ['class'=>'menu-item'],
                    'linkOptions' => [
                       'class'=>'sub-menu-item'
                    ],
                ]
            ]
        ];
    }
        echo yii\bootstrap5\Nav::widget([
			'encodeLabels' => false,
            'items' => $items,                        
			'options' => ['class' =>'ul-menu'],
        ]);
    ?>
</nav>
            <div class="darkLight-searchBox">
				<div class="col px-0 d-none d-md-block text-center my-sm-n1 my-md-2 text-nowrap">
                <?= Html::a('EN', Url::current(['lang' => 'en']), ['class' => ['mt-1 btn btn-sm', Yii::$app->language === 'en' ? 'btn-primary' : 'btn-outline-primary'], 'hreflang' => 'en-UA', 'rel' => 'nofollow']) ?>
                <?= Html::a('RU', Url::current(['lang' => 'ru']), ['class' => ['mt-1 btn btn-sm', Yii::$app->language === 'ru' ? 'btn-primary' : 'btn-outline-primary'], 'hreflang' => 'ru-UA', 'rel' => 'nofollow']) ?>
				</div>
                    <div class="dark-light">                        
                        <i class="uil uil-moon moon"></i>
                        <i class="uil uil-sun sun"></i>
                    </div>
					 <div class="searchBox">
                        <div class="searchToggle">
                            <i class="uil uil-times cancel"></i>
                            <i class="uil uil-search search"></i>
                        </div>
                        <div class="search-field">
                          <!--  <input type="text" placeholder="Search..." /-->
					<form action="<?= Url::to(['/search']) ?>" class="input-group">
                    <?php  
                    $template = '<a href="{{link}}">{{value}}</a>';
                    echo Typeahead::widget([
                        'id' => 'search',
                        'name' => 'query',
                        'value' => Yii::$app->request->get('query'),
                        'container' => [
                            'style' => 'flex: 1;',
                        ],
                        'options' => [
                            'placeholder' => Yii::t('app', 'Enter the name of the product'),
                            'style' => 'border-bottom-right-radius: 0; border-top-right-radius: 0; font-size: 1rem;',
                        ],
                        'pluginOptions' => [
                            'highlight' => true,
                        ],
                        'dataset' => [
                            [
                                'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                                'display' => 'value',
                                'templates' => [
                                    'notFound' => '<div class="text-danger" style="padding:0 8px">' . Yii::t('app', 'No results were found for this request.') . '</div>',
                                    'suggestion' => new JsExpression("Handlebars.compile('{$template}')"),
                                ],
                                'remote' => [
                                    'url' => Url::to(['/search/list']) . '?q=%QUERY',
                                    'wildcard' => '%QUERY',
                                    'cache' => false,
                                ],
                                'limit' => 10
                            ]
                        ]
                    ]);
                    ?>
                    
                        <button class="btn btn-primary" type="submit"><i class="uil uil-search-alt"></i></button>                    
                </form>                 
                </div>
                    </div>   
                    <div class="cart-checkout">
                        <i class="uil uil-shopping-bag shopping-cart"></i>
                    </div>
                    <!-- <i class="fa-solid fa-bars open-nav"></i> -->
                </div>
            </section>
            <div class="progress"></div>
        </div>
    </header><!-- header-end ./ -->

<main class="wrapper"> 
    <?php if (Yii::$app->controller->id !== 'site' || Yii::$app->controller->action->id !== 'index'): ?>
		<section class="hero">
            <div class="container-fluid">
                <div class="row">
                    <h2>#tb__stayhome</h2>
                    <p>Save more with coupons &amp; up to 70% off!</p>
                </div>
            </div>
        </section>
           
        <section class="<?= $this->context->secClass;?>">
			   <div class="container">
    <?php else: ?>
		   <section class="carousel">
  <?php 
  $slides = [];
foreach (Slide::find()->orderBy('position')->all() as $slide) {
    /** @var $slide common\models\Slide */
    $slides[] = [
        'content' => Html::img(Yii::$app->urlManager->baseUrl . '/uploads/slide/' . $slide->id . '.jpg'),
        'caption' => Html::tag('h1', $slide->title) . $slide->body,
		'captionOptions' => ['class' => ['d-none', 'd-md-block']]
    ];
}
 echo Carousel::widget([
    'id' => 'home-slider',
    'items' => $slides,
    'options' => [
        'class' => 'carousel carousel-dark slide',
        'data-interval' => 80,
    ],
    'controls' => [
        '<span class="icon-prev"></span>',
        '<span class="icon-next"></span>',
    ],
]) ?>

</section>
            <div class="mainblock col-12">
        <?php endif; ?>
            <?php
            if (isset($this->params['breadcrumbs'])) {
                echo Html::tag(
                    'div',
                    Breadcrumbs::widget([
                        'links' => $this->params['breadcrumbs'],
                        'homeLink' => [
                            'label' => Yii::$app->name,
                            'url' => Yii::$app->homeUrl,
                        ],
                    ]), [
                    'class' => 'bg-grey'
                ]);
            }
            ?>
            <?= $content ?>
        </div>
		</div>  <!--  container  -->
    </section>

    <?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') : ?>

    <?= OrderScheme::widget(['baseUrl' => $asset->baseUrl]) ?>

    <section class="card how my-4">
        
    </section>

    <div class="card how my-4">
        <div class="card-body">
            <div class="h1 text-center"><?= Yii::t('app', 'Reviews about the company') ?></div>
            <?php
            $review = Review::find()
                ->where(['status' => Review::STATUS_PUBLISHED])
                ->andWhere(['product_id' => null])
                ->orderBy(['id' => SORT_DESC])
                ->limit(5)
                ->all();
            echo '<div class="review-list">';
            foreach ($review as $r) {
                echo '<div class="media">';
                echo $this->render('../site/_review_item', [
                    'model' => $r,
                ]);
                echo '</div>';
            }
            echo '</div>';
            ?>
        </div>
    </div>

    <?php endif; ?>

    <div id="sidebarbottom">
        
    </div>
</main>	
<!-- News Letter -->
<section class="newsletter">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-8">
                        <div class="newstext">
                            <h4>Sign Up For Newsletters!</h4>
                            <p>Get E-Mail updates about our Latest Products and <span>special offers</span>.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="n-form">
                            <input type="text" placeholder="Your E-Mail Address...">
                            <button class="btn-normal">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
</section>

<!-- Footer -->
<footer class="footer">
        <div class="container-footer">
            <div class="row">
                <div class="col-lg-4 col-md-6 contact1">				
                   <a href="<?= Url::to(['/']) ?>"> <img src="/public/img/nyxta.png" class="footer-logo" alt="Nyxta - Logo"></a>
                    <h4>Contact</h4>
					
					     <p><span class="fw-bold">Address:</span> <?= Yii::$app->params['address_' . Yii::$app->language] ?></p>
                    <p><span class="fw-bold">Tel:</span><?= Yii::$app->params['phone1'] ?></p>
                    <p><span class="fw-bold">Open:</span> 07:00 - 22:00, Monday - Friday</p>
                    <div class="social-fllw">
                        <h4>Follow us</h4>
                        <div class="icons d-flex justify-content-between align-items-center">
                            <a href="https://m.facebook.com/page">
                                <i class="uil uil-facebook"></i>
                            </a>
                            <a href="https://instagram.com/page">
                                <i class="uil uil-instagram"></i>
                            </a>
                            <a href="https://twitter.com/page">
                                <i class="uil uil-twitter-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-2 contact2">
				    <nav class="nav flex-column">
                            <?php
                            $items = [
                                ['label' => Yii::t('app', 'Home'), 'url' => ['/']],
                                ['label' => Yii::t('app', 'Catalog'), 'url' => ['/category/index']],
                                ['label' => Yii::t('app', 'Find product'), 'url' => ['/podbor/index']],
                                ['label' => Yii::t('app', 'How to order'), 'url' => ['/site/how']],
                            ];
                            echo Nav::widget([
                                'items' => $items,
                                'activeClass' => '',
                            ]);
                            ?>
                    </nav>
                   
                </div>

                <div class="col-md-6 col-lg-2 contact3">
                   <nav class="nav flex-column">
                            <?php
                            $items = [
                                ['label' => Yii::t('app', 'Questions and answers'), 'url' => ['/site/questions']],
                                ['label' => Yii::t('app', 'Information for clients'), 'url' => ['/info/index']],
                                ['label' => Yii::t('app', 'Contacts'), 'url' => ['/site/contacts']],
                                ['label' => Yii::t('app', 'Reviews'), 'url' => ['/site/reviews']],
                            ];
                            echo Nav::widget([
                                'items' => $items,
                                'activeClass' => '',
                            ]);
                            ?>
                        </nav>
                </div>

                <div class="col-lg-4 col-md-6 install">
                    <h4>Install App</h4>
                    <p>From App Store or Google Play</p>
                    <div class="download-on">
                        <img src="/public/img/buttons/app-store.png" alt="">
                        <img src="/public/img/buttons/google-play.png" alt="">
                    </div>
                    <p>Secured Payment Getaway</p>
                    <div class="payment">
                        <i class="uil uil-master-card"></i>
                        <i class="uil uil-paypal"></i>
                        <i class="uil uil-transaction"></i>
                        <i class="uil uil-bill"></i>
                        <i class="uil uil-credit-card-search"></i>
                        <i class="uil uil-university"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="copyright">			 
                <p class="copy">©<span id="year">2022</span></p>
                <a href="<?= Url::to(['/']) ?>" class="go-to-link">
                    <p class="by">By:</p>
                    <span id="author"><?= Yii::$app->name ?></span>
                </a>
            </div>
        </div>

        <button class="back-to-top">
            <i class="uil uil-angle-up"></i>
        </button>

        <div class="cookie hide">
            <div class="welcome-alert alert alert-dismissible fade show d-none" role="alert">
                <section class="ms">
                    <strong>Hello, Welcome to Nyxta!</strong>
                    <h1 id="author">By: <strong>Web Studio</strong></h1>
                </section>
                <button type="button" class="btn-close welcome"></button>
            </div>
            <div>
                <img src="../public/img/other/cookie.png" alt="Cookie Png">
            </div>
            <div class="content">
                <h1>Cookies Content</h1>
                <p>We use Cookies to ensure you get the best experience while shooping!</p>
                <a href="#" class="item">Learn more</a>
            </div>
            <div class="btn-actions">
                <button class="item">I Understand</button>
            </div>
        </div>
    </footer>

<?= Modal::widget([
    'titleTag' => 'h3',
    'center' => true,
    'size' => 'modal-lg',
]); ?>
<!--?= $this->render('_counters') ?-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>