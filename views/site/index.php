<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\OrderScheme;
use app\widgets\HomeProductCard;
use app\widgets\HomeQuoteCard;
use app\widgets\HomeFaqCard;


/** @var yii\web\View $this */

$this->title = 'Nyxta';
?>
<!--?php
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
    ?-->
    <!--?php
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
]) ?-->

<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Products By Categories</h1>
    </div>

    <div class="body-content">
        <div class="row">
            <?= \dominus77\owlcarousel2\Carousel::widget([
                'items' => $this->render('_nav',['categories'=>$categories]), // example
                'theme' => \dominus77\owlcarousel2\Carousel::THEME_GREEN, // THEME_DEFAULT, THEME_GREEN
                'tag' => 'div', // container tag name, default div
                'containerOptions' => ['class' => 'categories__slider'], // container html options
                'clientOptions' => [
                    'loop' => true,
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
        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="/catalog">SHOP NOW &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="/catalog">SHOP NOW &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="/catalog">SHOP NOW &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
