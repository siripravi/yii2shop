<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 02.04.17
 * Time: 22:03
 *
 * @var $similar dench\products\models\Product[]
 * @var $viewed boolean
 */

use app\modules\main\widgets\ProductCard;

?>
<!--
<php if ($viewed): ?>
    <div class="h1 text-center mt-4"><= Yii::t('app', 'You looked through') ?></div>
<php else: ?>
    <div class="h1 text-center mt-4"><= Yii::t('app', 'Similar products') ?></div>
<php endif; ?>
-->
<section class="py-5" style="background-color:white">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
		    </div>		
				<div class="row">
    <?php foreach ($similar as $product) : ?>
        <div class="col-md-6 col-lg-4">
            <?= ProductCard::widget([
                'model' => $product,
                'link' => ['/main/product/index', 'slug' => $product->slug],
            ]);
            ?>
        </div>
    <?php endforeach; ?>
</div>
            </div>
     
</section>
