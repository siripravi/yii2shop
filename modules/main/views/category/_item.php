<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 25.03.17
 * Time: 13:24
 *
 * @var common\modules\products\models\Product $model
 */

use app\modules\main\widgets\ProductCard;

echo ProductCard::widget([
    'model' => $model,
    'link' => ['/main/product/index', 'slug' => $model->slug],
]);