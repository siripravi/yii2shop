<?php
use app\modules\main\widgets\PriceTable;
use admin\modules\image\helpers\ImageHelper;
use yii\bootstrap5\Dropdown;
use yii\bootstrap5\Button;
use yii\helpers\Url;
use yii\helpers\Html;

?>

<div class="card card-light bg-light text-white mb-3 " style="width: 18rem;">
    <?php  $image = $model->getImages()->one();  ?>
    <?php if ($image) { ?>
		<img src="<?= ImageHelper::thumb($image->id, 'micro') ?>" alt="<?= $image->alt ? $model->image->alt : $model->name ?>" title="<?= $model->title ?>" class="card-img rounded-circle">
			<?php } else { ?>
				<img class="card-img rounded-circle" src="<?= Yii::$app->params['image']['none'] ?>" alt="">
		<?php } ?>  
    <div class="text-dark text-center">
        <h3><?= $model->name;?></h3> 
        <h4><?php echo Html::a($model->name, ['/admin/products/default/index', 'ProductSearch[category_id]' => $model->id]);?></h4>
    </div>
    <div class="card-body text-white">
        <div class="row">
            <div class="text-end">
                <?php                
                echo Html::a("Edit",Url::to('/admin/products/category/update?id='.$model->id),['class'=>'btn btn-warning']);
                ?>           
            </div>       
            <div class="text-start">
                In<h6><?=$model->shortTitle;?></h6>
            </div>
        </div>              
    </div>   
</div>
