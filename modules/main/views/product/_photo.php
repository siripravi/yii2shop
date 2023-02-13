<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 02.04.17
 * Time: 22:52
 *
 * @var $model dench\products\models\Product
 */

use app\modules\main\widgets\Gallery;
use common\modules\image\helpers\ImageHelper;
use app\modules\main\widgets\Carousel;
use yii\helpers\Html;
?>
<?php
foreach ($model->variants as $variant) {
    foreach ($variant->images as $image) {
        $images[] = $image;
    }
}
$items = [];
foreach ($images as $photo) {
    $items[] = [
        'image' => ImageHelper::thumb($photo->id, 'big'),
        'thumb' => ImageHelper::thumb($photo->id, 'micro'),
        'width' => Yii::$app->params['image']['size']['big']['width'],
        'height' => Yii::$app->params['image']['size']['big']['height'],
        'title' => $photo->alt,
    ];
}
$thumbnails = [];
// Gallery images
/*$galleryItems[] = [
    'content' => Html::img($model->getImageUrl()),//Yii::$app->urlManager->baseUrl . '/uploads/product/' . $model->id . '/main.jpg',
    'options' => [
	
        'title' => $model->name,
    ],
];*/
$thumbnails[0] = ['thumb' => ImageHelper::thumb($model->image->id, 'big')];
foreach ( $images as $id => $photo) {
	$thumbnails[$id] = ['thumb' => ImageHelper::thumb($photo->id, 'micro')];
    $galleryItems[] = [
        'content' => Html::img(ImageHelper::thumb($photo->id, 'big')),
        'options' => [		   
            'title' => $photo->alt,
        ],
    ];
}
?>


    
        <?php	/*echo Carousel::widget([
      'items' => 
          $galleryItems,
       'items'  => $items,
	   'options'  => ['class' => 'col-10 carousel-multi-item','ride'=>true]
      
  ]);*/ ?>
   

<?php

$images = [];
foreach ($model->variants as $variant) {
    foreach ($variant->images as $image) {
        $images[] = $image;
    }
}
$items = [];
foreach ($images as $photo) {
    $items[] = [
        'image' => ImageHelper::thumb($photo->id, 'big'),
        'thumb' => ImageHelper::thumb($photo->id, 'micro'),
        'width' => Yii::$app->params['image']['size']['big']['width'],
        'height' => Yii::$app->params['image']['size']['big']['height'],
        'title' => $photo->alt,
    ];
}
?>

<div class="col-lg-6 mt-5"> 
<?php
echo Gallery::widget([
    'items' => $items,
    'options' => [
        'class' => 'gallery row mx-0',
    ],
    'itemOptions' => [
        'class' => 'img-thumbnail',
    ],
    'linkOptions' => [
        'class' => 'gallery-item col-lg-4 col-md-6 px-1',
    ],
]);
if (count($images) <= 1) {
    echo "<style>.gallery { display: none; }</style>";
}
?>
</div>