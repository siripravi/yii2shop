<?php
use yii\helpers\Url;
use yii\widgets\ListView;

use common\modules\image\helpers\ImageHelper;
?>
<div class="container how my-4"> 
         <div class="row">
		<div class="col-lg-6 offset-lg-3">
		<div class="section_title text-center"><h3>Popular on Nyxta</h3></div>
		</div>
		</div>   
<?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
         'layout' => '
		 <div class="boxes"><div class="container"><div class="row"><div class="col"><div class="boxes_container d-flex flex-row align-items-start justify-content-between flex-wrap">{items}</div></div></div></div></div>',
        'emptyTextOptions' => [
            'class' => 'alert alert-danger',
        ],
        /*'options' => [
            'class' => 'boxes_container d-flex flex-row align-items-start justify-content-between flex-wrap',
        ],*/
        'itemOptions' => [
            'class' => 'box',
        ]
    ]);
	
	
/*	$images = [];
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
		*/
		
    ?>
	</div>