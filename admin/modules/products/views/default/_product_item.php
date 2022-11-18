<?php
use app\modules\main\widgets\PriceTable;
use admin\modules\image\helpers\ImageHelper;
use yii\bootstrap5\Dropdown;
use yii\bootstrap5\Button;
use yii\helpers\Url;
use yii\helpers\Html;
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

<div class="card card-light bg-light text-white mb-3 " style="width: 18rem;">  
        <?php if ($model->image) { ?>
		<img src="<?= ImageHelper::thumb($model->image->id, 'micro') ?>" alt="<?= $model->image->alt ? $model->image->alt : $model->name ?>" title="<?= $model->title ?>" class="card-img rounded-circle">
			<?php } else { ?>
				<img class="card-img rounded-circle" src="<?= Yii::$app->params['image']['none'] ?>" alt="">
		<?php } ?>  
        <div class="text-dark text-center">
            <h3><?= $model->name;?></h3> 
            <h4><?php echo $model->variants[0]->price;?></h4>
        </div>
        <?php
         /* echo Dropdown::widget([
              'items' => [
                  ['label' => 'DropdownA', 'url' => '/'],
                  ['label' => 'DropdownB', 'url' => '#'],
              ],
          ]);*/
        ?>           
    
     <div class="card-body text-white">
        <div class="row">
            <div class="text-end">
                <?php
                /*echo Button::widget([
                    'label' => 'Edit',
                    'options' => ['class' => 'btn btn-primary'],
                ]);*/ 
                echo Html::a("Edit",Url::to('/admin/products/default/update?id='.$model->id),['class'=>'btn btn-warning']);
                ?>           
            </div>       
            <div class="text-start">
                In<h6><?=$model->categories[0]->shortTitle;?></h6>
            </div>
        </div>              
    </div>   
</div>
