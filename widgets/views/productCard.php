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

<div class="card mb-4 imgBox border-0">
       
    <div class="card-header overflow-hidden position-relative p-0">
        <?php if ($model->image) { ?>
                <img src="<?= ImageHelper::thumb($model->image->id, 'micro') ?>" alt="<?= $model->image->alt ? $model->image->alt : $model->name ?>" title="<?= $model->title ?>" class="img-fluid w-100">
        <?php } else { ?>
                <img class="img-fluid w-100" src="<?= Yii::$app->params['image']['none'] ?>" alt="">
        <?php } ?>
        <div class="card-img-overlay">
            <?php
                $floor = floor($rating['value']);
                for ($i = 0; $i < $floor; $i++) {
                echo '<span><i class="fa fa-star text-warning"></i></span> ';
                }
            if ($floor < $rating['value']) {
                    echo '<span><i class="fa fa-star-half text-warning"></i></span> ';
            }
            ?>
        </div> 
    </div>
    <div class="card-body p-0 bg-black text-white">
        <h6 class="text-center my-3"><?= $model->name;?></h6>
        <p>In <a href="/"><?=$model->categories[0]->shortTitle;?></a></p>
        <div class="d-flex justify-content-center mb-1">
            <h6>$123.00</h6><h6 class="text-muted ms-2"><del><?php echo $model->variants[0]->price;?></del></h6>
        </div>
    </div>
    <div class="card-footer bg-black">
        <div class="d-flex justify-content-between border-top border-danger">
            <a href="<?= $link;?>" class="btn btn-sm text-dark my-1 border-0 text-white" title="View Detail">
            <iconify-icon icon="carbon:view" width="32" height="32"></iconify-icon>
            </a>
            <a href="#" class="btn btn-sm text-dark my-1 border-0 text-white" title="Add To Cart">
            <iconify-icon icon="ei:cart" style="font-size:32px"></iconify-icon>
            </a>
        </div>        
    </div>

    
</div>
