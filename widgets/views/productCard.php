<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 25.03.17
 * Time: 13:30
 *
 * @var $model dench\products\models\Product
 * @var $link string
 * @var $rating array
 */

use app\widgets\PriceTable;
use app\helpers\ImageHelper;

$variant = @$model->variants[0];

if (@$model->variants[0]->price) {
    $available = 0;
    foreach ($model->variants as $variant) {
        if ($variant->enabled) {
            if ($variant->available < 0) {
                $available = -1;
            }
            if ($variant->available > 0) {
                $available = 1;
                break;
            }
        }
    }
}
?>

<div class="card mb-4 product border-1 pb-3">
    <?php if ($model->image) { ?>
                <img src="<?= ImageHelper::thumb($model->image->id, 'micro') ?>" alt="<?= $model->image->alt ? $model->image->alt : $model->name ?>" title="<?= $model->title ?>" class="card-img-top">
        <?php } else { ?>
                <img class="card-img-top" src="<?= Yii::$app->params['image']['none'] ?>" alt="">
    <?php } ?>
    <span class="badge bg-success position-absolute text-white mt-2 ms-2"><a href="/" class="text-white"><?=$model->categories[0]->shortTitle;?></a></span>
    <?php if($model->statuses):?>
    <span class="badge  text-white position-absolute r-0 mt-2 me-2" style="background-color:<?=$model->statuses[0]->color;?>;">
       
         <?= $model->statuses[0]->name; ?>
    
    </span>
    <?php endif; ?>
    <span class="rounded position-absolute p-2 bg-warning text-white ms-2 small mt-5"></span>
    <div class="card-body overflow-hidden position-relative p-0">        
        <h6 class="card-subtitle mb-2"><a class="text-decoration-none" href="/product/detail"><?= $model->name;?></a></h6>
        <div class="my-2"><span class="fw-bold h5"><?php echo $model->variants[0]->price;?></span>
            <!--<del class="small text-muted ms-2">$2000</del>  -->
            <span class="ms-2">
                <?php
                $floor = floor($rating['value']);
                for ($i = 0; $i < $floor; $i++) {
                    echo '<span><i class="fa fa-star text-warning"></i></span> ';
                    }
                if ($floor < $rating['value']) {
                        echo '<span><i class="fa fa-star-half text-warning"></i></span> ';
                }
                ?>     
            </span>
        </div>
        <div class="btn-group  d-flex" role="group">
            <button type="button" class="btn btn-sm btn-primary" title="Add to cart">
            <img src="/image/site/cart.svg">
            </button>
            <a type="button" href="<?= $link; ?>" class="btn btn-sm btn-outline-warning" title="View Detail">
            <img src="/image/site/eye.svg">
            </a>
        </div>
    </div>
</div>
