
<?php
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="col-12 bg-dark py-2 d-md-block d-none">
    <div class="row">
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
            ['label' => Yii::t('app', 'Find product'), 'url' => ['/podbor/index']],

        ];
       ?>
        <div class="col-auto me-auto">
            <ul class="xtop-nav">
                <li>
                   <a style="color:#fff"><iconify-icon icon="clarity:phone-handset-line" style="color: #FFF;" width="20" rotate="0deg"></iconify-icon>
                         +91 833-185-27000</a>                             
                </li>
                <li>
                    <a href="mailto:mail@ecom.com"><i class="fa fa-envelope me-2"></i>mail@ecom.com</a>
                </li>
            </ul>
        </div>
        <div class="col-auto me-auto">
        <?= Nav::widget([
            'options' => ['class' => "xtop-nav"],
            'items' => $menuItems,
        ]); ?>
        </div>
        <div class="col-lg-auto text-center text-lg-left header-item-holder">
            <span class="">
                <?= Html::a('<iconify-icon icon="emojione:flag-for-united-states" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'en']), ['class' => ['btn btn-sm', Yii::$app->language === 'en' ? '' : ''], 'hreflang' => 'us-EN', 'rel' => 'nofollow']) ?>
            </span>
            <span class="border-start border-primary">
                <?= Html::a('<iconify-icon icon="emojione:flag-for-india" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'hi']), ['class' => ['btn btn-sm', Yii::$app->language === 'hi' ? '' : ''], 'hreflang' => 'hi-IN', 'rel' => 'nofollow']) ?>
            </span>
        </div>
        
        <div class="d-flex justify-content-center h-100">
            <div class="searchbar">
                <input class="search_input" type="text" name="" placeholder="Search...">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
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
            'options' => ['class' => 'xtop-nav'],
            'items' => $menuItems,
        ]); ?>
        </div>
        <!--?php NavBar::end(); ?-->
    </div>
</div>
<!-- Top Nav -->
