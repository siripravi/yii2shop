<?php
  use yii\helpers\Html;
  use yii\helpers\Url;

?>

<div class="menu .d-inline-flex">
    <div class="menu_nav d-flex flex-column mb-3 .justify-content-center">
        <div class="p-2"><a href="/">Home</a></div>
        <div class="p-2">Flex item 2</div>
        <div class="p-2">Flex item 3</div>
    </div>    
</div>  
    
<header class="header">
<?= $this->render('_topNav');?>
    <div class="header_content d-flex flex-row align-items-center justify-content-start">       
        <div class="hamburger">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><iconify-icon icon="codicon:three-bars"></iconify-icon></span>
            </button>
        </div>
        <div class="header_content col-12 bg-white pt-4">  
            <div class="d-flex flex-row mb-3">
                <div class="col-lg-auto">
                    <div class="site-logo text-center text-lg-left">
                    <a href="/main" ><?= Html::img('/public/nyxta.png',["style"=>"max-height: 80%; padding: 0;position:relative;"]);?> </a>
                    </div>
                </div>      
                <div class="col-lg-5 mx-auto mt-4 mt-lg-0">                    
                    <?= $this->render('_searchForm');  ?>       		
                </div>       
                <div class="col-lg-auto text-center text-lg-left header-item-holder">   
                    <a href="/main/cart/index" class="mt-1"><iconify-icon icon="ant-design:shopping-cart-outlined" style="color: #0c3339;" width="32" rotate="20deg"></iconify-icon></a>
                    <?= Html::a('<iconify-icon icon="emojione:flag-for-united-states" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'en']), ['class' => ['btn btn-lg', Yii::$app->language === 'en' ? '' : ''], 'hreflang' => 'us-EN', 'rel' => 'nofollow']) ?>
                    <?= Html::a('<iconify-icon icon="emojione:flag-for-india" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'hi']), ['class' => ['btn btn-lg', Yii::$app->language === 'hi' ? '' : ''], 'hreflang' => 'hi-IN', 'rel' => 'nofollow']) ?>
                </div>        
            </div>            
        </div>
    </div>    
</header>
 
