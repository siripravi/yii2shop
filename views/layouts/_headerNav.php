<?php
  use yii\helpers\Html;
  use yii\helpers\Url;

?>

<div class="menu d-inline-flex">
    <div class="menu_nav d-flex flex-column mb-3 justify-content-center">
        <div class="p-2"><a href="/">Home</a></div>
        <div class="p-2"><a href="/blog">Blog</a></div>
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
        <div class="header_content col-12 bg-white pt-1">  
            <div class="header_right d-flex flex-row align-items-center ml-auto">
                <div class="col-3 justify-content-start">
                    <div class="col-lg-auto">
                        <div class="site-logo text-center text-lg-left justify-content-start ">
                            <a href="/"><?= Html::img('/image/site/nyxta.png',["style"=>"max-height: 80%; padding: 0;position:relative;"]);?></a>
                        </div>
                    </div>
                </div>    
                <div class="col-4 header_search ps-4">
                    <?= $this->render('_searchForm');  ?>       		
                </div>
                <!--<div class="user"><a href="#">
                        <iconify-icon icon="codicon:account" style="color: #0c3339;" width="20" rotate="0deg"></iconify-icon></a>
                </div>  -->
                <div class="cart">
                    <a href="/cart/index">
                        <iconify-icon icon="ant-design:shopping-cart-outlined" style="color: #0c3339;" width="40" rotate="20deg"></iconify-icon>
                    </a>
                </div>
                <div class="justifiy-content-end">
                    END CONTENT
                </div>            
            </div>     
        </div>
    </div>    
</header> 
