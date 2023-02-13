<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\assets\FontAwesomeAsset;
use app\modules\modal\Modal;
use yii\helpers\Url;
use kartik\icons\Icon;
use app\modules\page\models\Page;
use app\models\Question;
use app\models\Review;

use app\modules\cart\widgets\CartWidget;
use app\modules\cart\widgets\CartIconWidget;

use siripravi\slideradmin\models\Slider;
use siripravi\slideradmin\models\SliderImage;
use app\widgets\Carousel;
use yii\bootstrap5\Offcanvas;
use yii\widgets\Pjax;
AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style type="text/css">
         
         #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            }
        #home-slider .carousel-caption{
            position: absolute;
            margin: 0;
            color: white;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            }

    </style>
</head>
<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    
    <?= $this->render('_topNav');?>
    <!-- Navbar Start -->
    <!--Pjax::begin();               
    echo CartWidget::widget();  
    Pjax::end(); -->   
    <div class="container-fluid mb-3">           
        <!-- navbar-menu  -->           
        <?php
            $items = [];
            /** @var Page[] $info */
            $info = Page::find()
            //  ->joinWith('translation')
            // ->leftJoin('nxt_page_parent','nxt_page.category_idid = ')
               ->select(['nxt_page.name', 'slug'])
               ->andWhere(['category_id' => 8])
               ->orderBy(['nxt_page.position' => SORT_ASC])
               ->limit(5)
               ->all();
            $info_menu = [];
            foreach ($info as $item) {
                $info_menu[] = [
                    'label' => $item->name,
                    'url' => ['/info/view', 'slug' => $item->slug],
                ];
            }
            ?>
            <?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') : ?>
                <!-- navbar-carousel  -->
            <?php
                   /* $model = Slider ::find()-> one();
                    $slides = $model->slides;
                    foreach($slides as $sld){
                        if (($image = SliderImage::find()->where(['id' => $sld->id])->multilingual()->one()) !== null) {
                            $sitems[] = [  
                                'title' => 'Sintel',          
                                'content' => Html::img('@web/files/images/versions/large/'.$sld->filename)                 
                            ];
                        }
                    }*/
                $model = Slider ::find()-> one();
                $slides = $model->slides;
                foreach($slides as $sld){
                        if (($image = SliderImage::find()->where(['id' => $sld->id])->multilingual()->one()) !== null) {
                        $sitems[] = [
                       'content' => '<div class="home_slider_container">
                                     <div class="text-center p-0"><div class="">'.
                            $image->render($sld->filename,"large",["class" => "slider-img"]).	
                                        '</div>',
                        'caption' => '<div class="slide-text">'.
                                        Html::tag('h1', $image->title,['class'=>'h1 text-light']).
                                    '<h3 class="h2"></h3><p>'.$image->html.'</p></div></div></div>',		
                        'captionOptions' => ['class' => ['mb-0 d-flex align-items-center']],
                        
                    ];
                }  }
                ?>
                <div class="col-lg-12 bg-primary">
               
                <?php
                    echo Carousel::widget([
                        'id' => 'home-slider',
                        'items' => $sitems,
                        'showIndicators' => false, 
                       /* 'controls' => [
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span>',
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span>',
                        ],  */                    
                        'options' => [       
                            'data-interval' => 8, 
                                'data-bs-ride' => 'scroll'
                            ],
                            'controls' => [
                                '<span class="carousel-control-prev-icon"></span>',
                                '<span class="carousel-control-next-icon"></span>',
                            ],
                    ]) ?>
                </div>
                <?php endif;  ?> 
    <div class="container my-2 my-md-3">
        <div class="row">
            <?php if (Yii::$app->controller->id !== 'site' || Yii::$app->controller->action->id !== 'index'): ?>
                <!--  <div class="sidebar col-md-4 col-lg-3">
                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                        
                        </div>                   
                    </div>
                </div>  -->
                <div class="mainblock col-md-10 col-lg-12">
            <?php else: ?>
                <div class="mainblock col-12">
            <?php endif; ?>                
                <?= $content ?>
            </div>
        </div>
        <?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') : ?>       
        <div class="card bg-secondary how my-4">
            <div class="card-body">
                <div class="h1 text-center"><?= Yii::t('app', 'Questions and answers') ?></div>
                <?php
                $question = Question::find()
                    ->where(['status' => Question::STATUS_PUBLISHED])
                    ->orderBy(['id' => SORT_DESC])
                    ->limit(5)
                    ->all();
                echo '<div class="question-list">';
                foreach ($question as $q) {
                    echo '<div class="media">';
                    echo $this->render('../site/_question_item', [
                        'model' => $q,
                    ]);
                    echo '</div>';
                }
                echo '</div>';
                ?>
            </div>
        </div>
        <div class="card bg-secondary how my-4">
            <div class="card-body">
                <div class="h1 text-center"><?= Yii::t('app', 'Reviews about the company') ?></div>
                <?php
                $review = Review::find()
                    ->where(['status' => Review::STATUS_PUBLISHED])
                    ->andWhere(['product_id' => null])
                    ->orderBy(['id' => SORT_DESC])
                    ->limit(5)
                    ->all();
                echo '<div class="review-list">';
                foreach ($review as $r) {
                    echo '<div class="media">';
                    echo $this->render('../site/_review_item', [
                        'model' => $r,
                    ]);
                    echo '</div>';
                }
                echo '</div>';
                ?>
            </div>
        </div>
        <?php endif; ?>
        <div id="sidebarbottom">
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <!--<div class="card border border-primary border-strong block-link mb-3">
                        <a href="<= Url::to(['/podbor/index']) ?>">
                            <img class="card-img-top" src="/img/podbor.jpg" alt="<= Yii::t('app', 'Find glue') ?>">
                        </a>
                        <div class="card-body text-center">
                            <a href="<= Url::to(['/podbor/index']) ?>" class="card-text h4"><= Yii::t('app', 'Find product') ?></a>
                        </div>
                    </div>  -->
                </div>
                <div class="col-sm-6 col-md-12">
                    <?php
                    $item = $info[0];
                  //  echo Html::a('<small>' . $item->name . '</small>', ['/info/view', 'slug' => $item->slug], ['class' => 'btn btn-primary btn-lg btn-block mb-3']);
                    $item = $info[1];
                  //  echo Html::a('<small>' . $item->name . '</small>', ['/info/view', 'slug' => $item->slug], ['class' => 'btn btn-warning btn-lg btn-block mb-3']);
                    ?>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Back-to-Top  -->    
    <?= Modal::widget([
       
    ]); ?>
  </div> <!--  container fluid end -->    
  <?php echo $this->render('_footer', ['items' => $items]); ?>                         
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
