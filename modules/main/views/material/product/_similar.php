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
<div class="row justify-content-center">
                    <div class="col-md-8">
                        <article class="title text-center">
                            <h2 class="title-sec">Products</h2>
                            <p class="sub-title">Related Products </p>
                        </article>
                    </div>
                </div>
<div class="row">
    <?php foreach ($similar as $product) : ?>
        <div class="col-md-6 col-lg-4">
            <?= ProductCard::widget([
                'model' => $product,
                'link' => ['product/index', 'slug' => $product->slug],
            ]);
            ?>
        </div>
    <?php endforeach; ?>
</div>