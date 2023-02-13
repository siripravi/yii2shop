<?php
use app\modules\main\widgets\PriceTable;
use common\modules\image\helpers\ImageHelper;
use yii\helpers\Url;
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
<?php if(isset($model->image)):?>
<div class="background_image" style="background-image:url(<?= ImageHelper::thumb($model->image->id, 'small') ?>)"></div>
<?php endif;  ?>
<div class="box_content d-flex flex-row align-items-center justify-content-start">
<div class="box_left">
<div class="box_image">
<?php if(isset($model->image)):?>
<a href="category.html">

<div class="xbackground_image" style="background-image:url(<?= ImageHelper::thumb($model->image->id, 'small') ?>)"></div>

</a>
<?php endif;  ?>
</div>
</div>
<div class="box_right text-center">
<div class="box_title">Trendsetter Collection</div>
</div>
</div>

