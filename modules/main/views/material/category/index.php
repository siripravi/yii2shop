<?php

/** @var $this yii\web\View */
/** @var $page app\modules\main\components\Page */
/** @var $categories dench\products\models\Category[] */
/** @var $dataProvider yii\data\ActiveDataProvider */

use common\modules\image\helpers\ImageHelper;
use common\modules\products\models\Category;
use yii\helpers\Url;
use yii\widgets\ListView;

$this->params['breadcrumbs'][] = $page->name;
?>
<h1 class="mb-3"><?= $page->h1 ?></h1>

<?php if ($page->short) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <?= $page->short ?>
        </div>
    </div>
<?php endif; ?>
<section class="products-categories">
            <div class="container">
	<div class="row">
    <?php foreach ($categories as $category) : ?>
        <?php
        $url = Url::to((count($category->categories)) ? ['category/pod', 'slug' => $category->slug] : ['category/view', 'slug' => $category->slug]);
        ?>
        <div class="col-md-6 col-lg-4">
		    <div class="product-item-inner">
            
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
                
                <a href="<?= $url ?>" class="link">
                   <span class="cat"><i class="uil uil-tag-alt"></i> <?= $category->name ?></span>
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
                   <!-- <h4><span class="old-prc">169.00€</span>135.20€</h4>  -->
                </div>
               <!-- <a href="./single-products.html" class="go-to-cart"><i class="uil uil-shopping-bag shopping-cart cart"></i></a>  -->
            </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
</div>
</section>
<h2 class="mb-3"><?= Yii::t('app', 'Product catalog') ?></h2>

<!--?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    'layout' => "{items}\n{pager}",
    'emptyTextOptions' => [
        'class' => 'alert alert-danger',
    ],
    'options' => [
        'class' => 'list-group mb-4',
    ],
    'itemOptions' => [
        'class' => 'list-group-item',
    ],
]);
?-->

<?php if (!Yii::$app->request->get('page') && $page->text) : ?>
    <div class="card mb-3">
        <div class="page-seo card-body">
            <?= $page->text ?>
        </div>
    </div>
<?php endif; ?>
