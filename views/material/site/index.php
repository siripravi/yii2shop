<?php

/* @var $this yii\web\View */
/* @var $page dench\page\models\Page */
/* @var $categories dench\products\models\Category[] */

use common\modules\image\helpers\ImageHelper;
use yii\helpers\Url;

?>
<h1 class="mb-4 text-center"><?= $page->h1 ?>Search Products By Categories</h1>
<section class="products-categories">
            <div class="container">
	<div class="row">
<?php foreach ($categories as $category) : ?>
        <?php
        $url = Url::to((count($category->categories)) ? ['category/pod', 'slug' => $category->slug] : ['category/view', 'slug' => $category->slug]);
        ?>
        <div class="col-md-6 col-lg-4">
		    <div class="product-item-inner">
            <!--<span class="discount">-25%</span> -->
			<a href="<?= $url ?>" rel="nofollow" class="link">
			    <figure class="img-box">
				<?php if ($category->image) { ?>
					<img src="<?= ImageHelper::thumb($category->image->id, 'small') ?>" alt="<?= $category->image->alt ? $category->image->alt : $category->name ?>" title="<?= $category->title ?>">
				<?php } else { ?>
					<img class="img-fluid" src="<?= Yii::$app->params['image']['size']['category']['none'] ?>" alt="">
				<?php } ?>
				</figure>
			</a>
			<div class="details">
              <a href="<?= $url ?>" class="link">  <span class="cat"><i class="uil uil-tag-alt"></i> <?= $category->name ?></span>
                
                </a>
				
                <div class="star">
                    <!--?php
                $floor = floor($rating['value']);
                for ($i = 0; $i < $floor; $i++) {
                    echo '<i class="fa fa-star text-warning"></i> ';
                }
                if ($floor < $rating['value']) {
                    echo '<i class="fa fa-star-half text-warning"></i> ';
                }
                ?-->
                   <!-- <h4><span class="old-prc">169.00€</span>135.20€</h4> -->
                </div>
              <!--  <a href="./single-products.html" class="go-to-cart"><i class="uil uil-shopping-bag shopping-cart cart"></i></a>  -->
            </div>
            </div>
        </div>
    <?php endforeach; ?>

			
<!--?= \dominus77\owlcarousel2\Carousel::widget([
    'items' => $this->render('_nav',['categories' => $categories]), // example
    'theme' => \dominus77\owlcarousel2\Carousel::THEME_GREEN, // THEME_DEFAULT, THEME_GREEN
    'tag' => 'div', // container tag name, default div
    'containerOptions' => ['class' => 'categories__slider'], // container html options
    'clientOptions' => [
        'loop' => true,
        'margin' => 10,
        'nav' => true,
        'responsive' => [
            0 => [
                'items' => 1,
            ],
            600 => [
                'items' => 3,
            ],
            1000 => [
                'items' => 5,
            ],
        ],
    ],
]); ?-->
</div>

</div>
</section>
<section>
    <div class="row categories">
        CATEGORIES
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <?= $page->text ?>
        </div>
    </div>
</section>