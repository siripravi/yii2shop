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

use app\modules\main\widgets\PriceTable;
use common\modules\image\helpers\ImageHelper;

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

<div class="product">
<div class="product_image">
		<?php if ($model->image) { ?>
					<img src="<?= ImageHelper::thumb($model->image->id, 'micro') ?>" alt="<?= $model->image->alt ? $model->image->alt : $model->name ?>" title="<?= $model->title ?>" class="card-img rounded-0 img-fluid">
				<?php } else { ?>
					<img class="img-fluid" src="<?= Yii::$app->params['image']['none'] ?>" alt="">
		<?php } ?>
</div>
<div class="product_content">
<div class="product_info d-flex flex-row align-items-start justify-content-start">
<div>
<div>
<div class="product_name"><a href="<?= $link ?>"><?= $model->name;?></a></div>
<div class="product_category">In <a href="/"><?=$model->categories[0]->shortTitle;?></a></div>
</div>
</div>
<div class="ml-auto text-right">
<div class="rating_r rating_r_4 home_item_rating">
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
<div class="product_price text-right"><?php echo $model->variants[0]->price;?></div>
</div>
</div>
<div class="product_buttons">
<div class="text-right d-flex flex-row align-items-start justify-content-start">
<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
<div><div>
<a href="<?= $link;?>"><iconify-icon icon="carbon:view" width="32" height="32"></iconify-icon></a></div></div>
</div>
<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
<div><div><iconify-icon icon="ei:cart" width="32" height="32"></iconify-icon></div></div>
</div>
</div>
</div>
</div>
</div>

