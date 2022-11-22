<?php
namespace app\widgets;

use Yii;
use yii\base\Component;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Nav;

class TopNav extends Component {
    
    public function getMenu() {
       // $isAdmin = !Yii::$app->user->isGuest ? Yii::$app->user->identity->can('editor') : false;
       // $canAdmin = !Yii::$app->user->isGuest ? Yii::$app->user->identity->can('editor') : false;
      //  $networksVisible = count(Yii::$app->authClientCollection->clients) > 0;
        
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ];
        
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => Yii::t('app', 'Sign up'), 'url' => ['/user/registration/register']];
            $menuItems[] = ['label' => Yii::t('app', 'Sign in'), 'url' => ['/user/security/login']];
        } else {
            $menuItems['app'] = [
                'label' => 'Welcome',//$isAdmin ? Yii::$app->user->identity->profile->fullname .' (admin)': Yii::$app->user->identity->profile->fullname,
                'items' => [
                    ['label' => Yii::t('app', 'Profile'), 'url' => ['/user/settings/profile']],
                    ['label' => Yii::t('app', 'Account'), 'url' => ['/user/settings/account']],
                  //  ['label' => Yii::t('app', 'Networks'), 'url' => ['/user/settings/networks'], 'visible' => $networksVisible],
                    '<li class="divider"></li>',
                    ['label'=>Yii::t('app', 'Logout'), 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']]
                ],
            ];
        }

    /*   if($canAdmin){
            $menuItems['app']['items'][] = '<li class="divider"></li>';
            $menuItems['app']['items'][]=['label' => Yii::t('app', 'Admin Panel'), 'url' => Yii::$app->urlManagerBackEnd->createUrl('')];
        }
    */
        NavBar::begin([
                'brandLabel' => Yii::$app->params['companyName'],
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
 
            echo Nav::widget([
                 'options' => ['class' => 'navbar-nav navbar-right'],
                 'items' => $menuItems,
             ]);
            
        NavBar::end();
    }

}