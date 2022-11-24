<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\cart\widgets\CartWidget;
use app\modules\cart\widgets\CartIconWidget;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Popover;
?>

<!-- Top Nav -->
<header class="p-3 border-bottom bg-light">
    <div class="container-fluid">
            <div class="row g-3">
            <div class="col-md-3 text-center">
            <span class="gaozhan-logo"><a href = "/"> 
                <img src = "/image/site/nyxta.png" alt="Nyxta" style="max-height: 80%; padding: 0;position:relative;">
                </a>
            </div>
            <div class="col-md-5">
                <?= $this->render('_searchForm');  ?> 
            </div>
            <div class="col-md-4">
            <?php
                 Popover::begin([
                     'title' => 'Hello world',
                     'toggleButton' => ['label' => 'click me'],
                 ]);
                
                 echo 'Say hello...';
                
                 Popover::end();
            ?>
              
            <?php
            $menuItems = [];//<iconify-icon icon="mdi:user-outline" style="color: #123;" width="20" rotate="0deg"></iconify-icon>
            if (Yii::$app->user->isGuest) {
                $menuItems[] = [
                    'label' =>  Html::tag('span', '<img src="/image/site/user.svg">',
                                      ["class"=>"d-inline-block", "tabindex"=>"0","data-bs-toggle"=>"popover", "data-bs-trigger"=>"hover focus", "data-bs-content"=>"click to login!"]),
                    'encode' => false,
                    'url' => ['/site/login'],
                    'linkOptions' => ['alt' => Yii::t('app', 'Login'), 'class' =>'rounded-circle border border-dark'],
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
                    'label' => Html::img(Yii::$app->user->identity->getAvatarImage(), 
                                  ['alt' => Yii::$app->user->identity->username, 'class' => 'rounded-circle border-2', 'width' => 20]),
                    'encode' => false,
                    'linkOptions' => ['alt' => Yii::t('app', 'Welcome'), 'data-bs-title' => Yii::t('app', 'Welcome'),'class' =>''],
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
                          
            <div class="btn-group">
                <?= Nav::widget([
                        'options' => ['class' => 'top-nav'],
                        'items' => $menuItems,
                ]); ?>
            </div>              
            
            <!-- cart like buttons -->
            <div class="position-relative d-inline me-3">
                <button type="button" class="btn btn-light position-relative rounded-circle border-2">
                <img src="/image/site/heart.svg">
                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">Liked</span>
                            </span>
                </button>
                <button type="button" class="btn btn-info position-relative rounded-circle border-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                <img src="/image/site/cart.svg">
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">Shopping cart</span>
                        </span>
                </button>  
                <?= CartIconWidget::widget();?>
            </div>     
            <div class="d-inline-flex ps-4">
                <?= Html::a('<img src="/image/site/flag-us.svg">', Url::current(['lang' => 'en']), ['class' => ['btn btn-sm', Yii::$app->language === 'en' ? '' : ''], 'hreflang' => 'us-EN', 'rel' => 'nofollow']) ?>
                <?= Html::a('<img src="/image/site/flag-ind.svg">', Url::current(['lang' => 'hi']), ['class' => ['btn btn-sm', Yii::$app->language === 'hi' ? '' : ''], 'hreflang' => 'hi-IN', 'rel' => 'nofollow']) ?>
            </div>
            
        </div>
    </div>
</header>

<?php
    NavBar::begin([
        //'brandLabel' => '<span class="gaozhan-logo">'.Html::img("/image/site/nyxta.png",["style"=>"max-height: 80%; padding: 0;position:relative;"]).'</span>',
        // 'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark bg-dark text-light shadow',
            //'style'=>"background-color: #e3f2fd;"
        ],
       ]);  ?>
        <div class="container-fluid">
            <?php     
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
                        'label' => Yii::t('app', 'Browse'),
                        //'url' => ['/category/index'],
                        'url' => ["#"],  
                        'options' => ['class' => 'nav-item dropdown dropdown-mega position-static'],
                        'linkOptions' => ['data-bs-auto-close' => 'outside'],
                        'active' => in_array(Yii::$app->controller->id, ['category', 'product']),
                        'items' => [
                            $this->render("_mega")
                        ]
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
        </div>  <!-- container-fluid -->
        <?php NavBar::end();   ?>   


        <?php if (Yii::$app->controller->id !== 'site' || Yii::$app->controller->action->id !== 'index'): ?>
                <div class="p-5 bg-primary bs-cover" style="background-image: url(<?= '/image/site/Banner_1.webp';?>);">
                <div class="container text-center">
                    <span class="display-5 px-3 bg-white rounded shadow">T-Shirts</span>
                </div>
                </div>
        <?php endif;  ?>
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