<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\cart\widgets\CartWidget;
use app\modules\cart\widgets\CartIconWidget;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
?>

<!-- Top Nav -->
<!-- Start Topbar  -->
<div class="container-fluid">
    <div class="row bg-dark text-light py-2 px-xl-5" >
        <div class="d-none d-lg-block col-lg-6">
            <div class="d-inline-flex">
                <a href="#" class="pe-2 text-light text-decoration-none">FAQs</a>
                <span class="text-muted  text-light "> | </span>
                <a href="#" class="px-2   text-light text-decoration-none">Help</a>
                <span class="text-muted"> | </span>
                <a href="#" class="px-2  text-light text-decoration-none">Support</a>
                <span class="text-muted"> | </span>
                <a href="mailto:mail@ecom.com" class="text-light"><i class="fa fa-envelope me-2"></i>mail@ecom.com</a>
                <span class="text-muted pe-2"> | </span>
                <a><iconify-icon icon="clarity:phone-handset-line" style="color: #FFF;" width="20" rotate="0deg"></iconify-icon>
                    +91 833-185-27000</a>   
            </div>
        </div>
        <!-- Social Media  -->
        <div class="col-lg-6 text-center ps-lg-8">
            <div class="d-inline-flex">
                <a href="#" class="px-2" title="Follow on Facebook"><iconify-icon icon="ic:outline-facebook" style="color: #FFFFFF;" width="26" ></iconify-icon></i></a>
                <a href="#" class="px-2"><iconify-icon icon="mdi:twitter" style="color: #FFF;" width="26" ></iconify-icon></a>
                <a href="#" class="px-2"><iconify-icon icon="ri:instagram-line" style="color: #FFF;" width="26" ></iconify-icon></i></a>
                <a href="#" class="px-2"><iconify-icon icon="typcn:social-linkedin" style="color: #FFF;" width="26" ></iconify-icon></a>
                <a href="#" class="px-2"><iconify-icon icon="icon-park-outline:youtube" style="color: #FFF;" width="26" ></iconify-icon></a>
                <a href="#" class="px-2"><iconify-icon icon="mingcute:pinterest-line" style="color: #FFF;" width="26" ></iconify-icon></a>
            </div>
            <div class="d-inline-flex ps-4">
                <?= Html::a('<iconify-icon icon="emojione:flag-for-united-states" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'en']), ['class' => ['btn btn-sm', Yii::$app->language === 'en' ? '' : ''], 'hreflang' => 'us-EN', 'rel' => 'nofollow']) ?>
                <?= Html::a('<iconify-icon icon="emojione:flag-for-india" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'hi']), ['class' => ['btn btn-sm', Yii::$app->language === 'hi' ? '' : ''], 'hreflang' => 'hi-IN', 'rel' => 'nofollow']) ?>
            </div>
        </div>
    </div>
    <!-- Shop Icon  -->
    <div class="row align-items-center py-0 px-xl-2 bg-warning">          
        <?php
                NavBar::begin([
                    'brandLabel' => '<span class="gaozhan-logo">'.Html::img("/image/site/nyxta.png",["style"=>"max-height: 80%; padding: 0;position:relative;"]).'</span>',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar navbar-expand-lg navbar-info',
                        //'style'=>"background-color: #e3f2fd;"
                    ],
                ]);
     
                $menuItems = [
                    [
                        'label' => Yii::t('app', 'Home'),
                        'url' => ['/'],
                        'active' => in_array(Yii::$app->controller->id, ['site']) && in_array(Yii::$app->controller->action->id, ['index']),
                        'linkOptions' => [
                            'class' => in_array(Yii::$app->controller->id, ['site']) && in_array(Yii::$app->controller->action->id, ['index']) ? 'nav-item nav-link text-white ml-3' : 'nav-item nav-link text-white',
                        ],
                    ],
                    [
                        'label' => Yii::t('app', 'Catalog'),
                        'url' => ['/category/index'],
                        'active' => in_array(Yii::$app->controller->id, ['category', 'product']),
                    ],
                    ['label' => Yii::t('app', 'Blog'), 'url' => ['/blog']],

                ];
            ?>
      
        <div class="col-auto me-auto">
                <?= Nav::widget([
                    'options' => ['class' => "top-nav"],
                    'items' => $menuItems,
                ]); ?>
        </div>
        <div class="col-lg-6 col-6 text-left"> 
                    <?= $this->render('_searchForm');  ?> 
        </div>
            <?php
            $menuItems = [];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = [
                    'label' => Html::tag('span', Yii::t('app', '<iconify-icon icon="codicon:account" style="color: #FFF;" width="24" rotate="0deg"></iconify-icon></i>Login')),
                    'encode' => false,
                    'url' => ['/site/login'],
                    'linkOptions' => ['alt' => Yii::t('app', 'Login'), 'title' => Yii::t('app', 'Login')],
                ];
            } else {
                $menuItems[] = [
                    'label' => Yii::t('app', 'Manage users'),
                    'url' => ['/user/index'],
                    'visible' => \Yii::$app->user->can('manage_users'),
                    'items' => [

                    ]
                ];
                $menuItems[] = [
                    'label' => Html::img(Yii::$app->user->identity->getAvatarImage(), ['alt' => Yii::$app->user->identity->username, 'class' => 'img-circle', 'width' => 20]),
                    'encode' => false,
                    'items' => [
                        [
                            'label' => Html::tag('span', Yii::$app->user->identity->username),
                            'url' => ['/user/view', 'id' => \Yii::$app->user->id],
                            'encode' => false,
                        ],
                        [
                            'label' => Html::tag('span', Yii::t('app', 'Bookmarks')),
                            'encode' => false,
                            'url' => ['/project/bookmarks'],
                            'linkOptions' => ['alt' => Yii::t('app', 'Bookmarks'), 'title' => Yii::t('app', 'Bookmarks')],
                        ],
                        [
                            'label' => Html::tag('span', Yii::t('app', 'Logout')),
                            'url' => ['/site/logout'],
                            'encode' => false,
                            'linkOptions' => [
                                'data-method' => 'post',
                                'alt' => Yii::t('app', 'Logout'),
                                'title' => Yii::t('app', 'Logout'),
                            ],
                        ]
                    ]
                ];
            }
        
            ?>
            <div class="col-auto">
                    <?= Nav::widget([
                        'options' => ['class' => 'top-nav'],
                        'items' => $menuItems,
                    ]); ?>
            </div>       
        </div>
</div>
<!-- Top Nav -->

    <div class="col-lg-3 col-6 text-right">
        <button type="button" class="btn btn-info position-relative border rounded-0">
            <iconify-icon icon="mdi:cards-heart" style="color: #FFF;" width="26" ></iconify-icon>
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">Liked</span>
                    </span>
        </button>
        <button type="button" class="btn btn-dark position-relative border rounded-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                <iconify-icon icon="material-symbols:shopping-cart" style="color: #FFF;" width="26" ></iconify-icon>
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">Shopping cart</span>
                </span>
        </button>  
            <?= CartIconWidget::widget();?>
    </div> 
        <?php NavBar::end();   ?>
            
    </div>
</div>
