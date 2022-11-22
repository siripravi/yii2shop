<?php

/* @var $this yii\web\View */
/* @var $page dench\page\models\Page */
/* @var $categories dench\products\models\Category[] */

//use common\modules\image\helpers\ImageHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\OrderScheme;
use app\widgets\HomeProductCard;
use app\widgets\HomeQuoteCard;
use app\widgets\HomeFaqCard;
use siripravi\slideradmin\models\Slider;
use siripravi\slideradmin\models\SliderImage;
use yii\bootstrap5\Carousel;
?>

<?php
    $model = Slider ::find()-> one();
    $slides = $model->slides;
    foreach($slides as $sld){
        if (($image = SliderImage::find()->where(['id' => $sld->id])->multilingual()->one()) !== null) {
            $items[] = [  
                'title' => 'Sintel',          
                'content' => Html::img('@web/files/images/versions/large/'.$sld->filename)                 
                ];
            }
    }
    ?>
    <?php
        echo Carousel::widget([
            'id' => 'home-slider',
            'items' => $items,
            
            'options' => [       
                'data-interval' => 8, 'data-bs-ride' => 'scroll'
            ],
            'controls' => [
            '<span><i class="uil uil-angle-left-b"></i></span>',
                '<span><i class="uil uil-angle-right-b"></i></span>',
            ],
        ]);
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

<p> <!--?= $page->name ?-->
<br>
<!--?= $page->text;?-->

    <!--?= HomeProductCard::widget(); ?--> 
    <!--?= OrderScheme::widget(['baseUrl' => $asset->baseUrl]) ?--> 
    <!--?= HomeFaqCard::widget();  ?-->
    <!--?= HomeQuoteCard::widget(); ?-->