<?php

/* @var $this yii\web\View */
/* @var $page dench\page\models\Page */
/* @var $categories dench\products\models\Category[] */

use common\modules\image\helpers\ImageHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\main\widgets\OrderScheme;
use app\modules\main\widgets\HomeProductCard;
use app\modules\main\widgets\HomeQuoteCard;
use app\modules\main\widgets\HomeFaqCard;
use siripravi\slideradmin\models\Slider;
use siripravi\slideradmin\models\SliderImage;
?>

<?php
    $model = Slider ::find()-> one();
    $slides = $model->slides;
    foreach($slides as $sld){
        if (($image = SliderImage::find()->where(['id' => $sld->id])->multilingual()->one()) !== null) {
        $items[] = [  
            'title' => 'Sintel',
           // 'url' => '@web/files/images/versions/large/'.$sld->filename,        
            'src' => '@web/files/images/versions/large/'.$sld->filename        
            
                ];
        }
    }
    ?>
    <?= dosamigos\gallery\Carousel::widget([
    'items' => $items, //'json' => true,
    'clientEvents' => [
        'onslide' => 'function(index, slide) {
            console.log(slide);
        }'
]]);
?>
    <?php
  /*echo \yii\bootstrap5\Carousel::widget([
        'id' => 'home-slider',
        'items' => $items,
        'options' => [       
            'data-interval' => 1000,
        
        ],
        'clientOptions' =>['interval' => 1000,'cycle'=> true],
        'controls' => [
        '<span><i class="uil uil-angle-left-b"></i></span>',
            '<span><i class="uil uil-angle-right-b"></i></span>',
        ],
    ]);
  */
    
    /*   'content' => '<div class="home_slider_container">
    <div class="row p-0"><div class="mx-auto">'.
$image->render($sld->filename,"large",["class" => "slider-img"]).	
    '</div>',
'caption' => '<div class="col-12">'.
    Html::tag('h1', $image->title,['class'=>'h1 text-success']).
'<h3 class="h2"></h3><p>'.$image->html.'</p></div></div></div>',		
'captionOptions' => ['class' => ['col-lg-12 mb-0 d-flex align-items-center']],
*/ 

 ?>  
 

<section>
<h1 class="mb-4 text-center">Products By Categories</h1>
<div class="row">
<?= \dominus77\owlcarousel2\Carousel::widget([
    'items' => $this->render('_nav',['categories'=>$categories]), // example
    //'theme' => \dominus77\owlcarousel2\Carousel::THEME_GREEN, // THEME_DEFAULT, THEME_GREEN
    //'tag' => 'div', // container tag name, default div
    'containerOptions' => ['class' => 'categories__slider'], // container html options
    'clientOptions' => [
        'loop' => false,
        'margin' => 10,
        'nav' => true,
        'responsive' => [
            0 => [
                'items' => 1,
            ],
            600 => [
                'items' => 3,
            ],
            1000 => [
                'items' => 5,
            ],
        ],
    ],
]); ?>
</div>
</section>
<p> <?= $page->name ?>
<br>
<?= $page->text;?>

    <!--?= HomeProductCard::widget(); ?--> 
    <!--?= OrderScheme::widget(['baseUrl' => $asset->baseUrl]) ?--> 
    <!--?= HomeFaqCard::widget();  ?-->
    <!--?= HomeQuoteCard::widget(); ?-->