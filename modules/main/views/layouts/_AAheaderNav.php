<?php
  use yii\helpers\Html;
  use yii\helpers\Url;

?>

<div class="row">
    <div class="col-lg-auto">
        <div class="site-logo text-center text-lg-left">
        <?= Html::img('/images/nyxta.png',["style"=>"max-height: 80%; padding: 0;position:relative;"]);?>
        </div>
    </div>
    <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
                <div class="header_search">
                    <?= $this->render('_searchForm');  ?>       		
                </div>
                <div class="user"><a href="#">
                    <iconify-icon icon="codicon:account" style="color: #0c3339;" width="20" rotate="0deg"></iconify-icon></a>
                </div>
                <div class="cart"><a href="/main/cart/index"><iconify-icon icon="ant-design:shopping-cart-outlined" style="color: #0c3339;" width="20" rotate="20deg"></iconify-icon></a></div>
                <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                    <iconify-icon icon="clarity:phone-handset-line" style="color: #0c3339;" width="20" rotate="0deg"></iconify-icon><span>+91 833-185-27000</span>
                </div>
                <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                    <?= Html::a('<iconify-icon icon="emojione:flag-for-united-states" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'en']), ['class' => ['mt-1 btn btn-sm', Yii::$app->language === 'en' ? '' : ''], 'hreflang' => 'us-EN', 'rel' => 'nofollow']) ?>
                    <?= Html::a('<iconify-icon icon="emojione:flag-for-india" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'hi']), ['class' => ['mt-1 btn btn-sm', Yii::$app->language === 'hi' ? '' : ''], 'hreflang' => 'hi-IN', 'rel' => 'nofollow']) ?>
                </div>
    </div>    
   
</div>
