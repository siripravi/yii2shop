<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 02.04.17
 * Time: 22:05
 *
 * @var $options dench\products\models\Product[]
 */

use yii\helpers\Url;

?>
<?php if ($options) : ?>
    <div class="product-section">
        <h2 class="product-section-title"><?= Yii::t('app', 'Related products') ?></h2>
        <div class="table-responsive">
            <table class="table table-condensed table-default table-width-auto">
                <thead>
                <tr>
                    <th></th>
                    <th><?= Yii::t('app', 'Price, UAH') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($options as $option) : ?>
                    <tr>
                        <?php if ($option->enabled) { ?>
                            <th><a href="<?= Url::to(['/main/product/index', 'slug' => $option->slug]) ?>" target="_blank"><?= $option->name ?></a></th>
                        <?php } else { ?>
                            <th><?= $option->name ?></th>
                        <?php } ?>
                        <td><?php
                            $variants = $option->variants;
                            $variant = current($variants);
                            echo @$variant->price;
                            ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>