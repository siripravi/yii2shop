<?php
  use yii\helpers\Html;
  use yii\helpers\Url;

?>

<div class="menu d-inline-flex">
    <div class="menu_nav d-flex flex-column mb-3 justify-content-center">
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
        <div class="header_content col-12 bg-white pt-1">  
        <?= $this->render('_headerNav');  ?>    		
                     
        </div>
    </div>    
</header>
 
