<?php
use common\modules\products\models\Category;
use yii\bootstrap5\Nav;
use yii\bootstrap5\Carousel;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Menu;
use common\modules\image\helpers\ImageHelper;
app\assets\ExampleAsset::register($this);
?>
    <?php
        $idx = 0;
        /** @var $categories Category[] */
		$cache = Yii::$app->cache;
        $categories = Category::getMain();
		!$cache->exists('_categories-' . Yii::$app->language) ? Category::getMain() : [];
        $items = [];
        foreach ($categories as $category) {
			$count = count($category->categories);
			$url = ($count) ? ['category/pod', 'slug' => $category->slug] : ['category/view', 'slug' => $category->slug];
            $items[$category->id] = [
                    'label' => $category->name,
                    'url' => ($count) ? ['category/pod', 'slug' => $category->slug] : 
					['category/view', 'slug' => $category->slug],
                    'options' => ['tag' => false],
            ];
        
           /* echo Menu::widget([
                       'items' => $items,
                       'linkTemplate' => '<a class="nav-link" href="{url}">{label}</a>',
                       'options' => [
                                   'tag' => 'div',
                                   'class' => 'nav nav-left flex-column',
                            ],
                        ]);
			*/
			$idx = ++$idx;
			$active='';
			
			if(isset($catTitle) && $category->slug == $catTitle){
			   $active = ' categories__item_current';	
			}
			
			$label = $category->getShortTitle()
				. '<span class="badge pull-right">'
				. "3"
				. '</span>';
				
			echo '<div class="item categories__item'.$active.'">			
			<a href="'.Url::to($url).'" title="'.$category->name.'">
			<div class="categories__item__icon">
			<span class="flaticon-006-macarons">'.Html::img(ImageHelper::thumb($category->image->id, 'micro'), ['alt' => 'click']).'</span><h5>'.$label.'</h5>
			</div></a>
			</div>';
	}
    ?>