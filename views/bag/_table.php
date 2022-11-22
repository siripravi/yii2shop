<?php
/* @var $this yii\web\View */
/* @var $items app\models\Variant[] */
/* @var $cart array */

use app\helpers\ImageHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$url_del = Url::to(['/bag/del']);
$url_set = Url::to(['/bag/set']);
$url_cart = Url::to(['/bag/block']);

$js = <<<JS
$('.product-delete').click(function(e){
    e.preventDefault();
    var id = $(this).attr('rel');
    $.get('{$url_del}', { id: id }, function(data){
        if (data) {
            $('#i' + id).fadeOut('normal', function(){
                $(this).remove();
                calculate();
            });
        }
    });
});
$('.product-count').keyup(function(){
    var a = $(this).attr('data-id');
    var b = $(this).val();
    $.get('{$url_set}', { id: a, count: b}, function(){
        $('.product-count[data-id="' + a + '"]').val(b);
        calculate();
    });
});
function reloadCart() {
    $.get('{$url_cart}', function(data) {
        $('#cart').after(data).remove();
    });
}
function calculate() { 
    $('.table-cart').each(function(){
        var total = 0;
        $(this).find('.product-count').each(function(){
            var sum = $(this).val() * $(this).attr('data-price');
            total += sum;
            $(this).parents('tr').find('.sum').text(sum);
        });
        $('.total').text(total);
        reloadCart();
    });
}
calculate();
JS;

$this->registerJs($js);
?>
 <?php if ($items) : ?>
<div class="table-responsive">
    <table class="table table-success table-striped table-cart">
        <tbody>
        <tr class="bg-gradient-secondary text-white">
            <th>№</th>
            <th><?= Yii::t('app', 'Photo') ?></th>
            <th><?= Yii::t('app', 'Product name') ?></th>
            <th><?= Yii::t('app', 'Packing') ?></th>
            <th><?= Yii::t('app', 'Count') ?></th>
            <th><?= Yii::t('app', 'Delete') ?></th>
            <th><?= Yii::t('app', 'Price per unit') . ', ' . $items[0]->currencyDef->before . $items[0]->currencyDef->after ?></th>
            <th><?= Yii::t('app', 'Amount') . ', ' . $items[0]->currencyDef->before . $items[0]->currencyDef->after ?></th>
        </tr>
        <?php foreach ($items as $k => $item) : ?>
            <tr id="i<?= $item->id ?>" rel="<?= $item->id ?>">
                <td><?= $k + 1 ?></td>
                <td>
                    <?php if (isset($item->product->image)) : ?>
                    <?= Html::a(Html::img(ImageHelper::thumb($item->product->image->id, 'micro'), ['height' => '70']), ['product/index', 'slug' => $item->product->slug]) ?>
                    <?php endif; ?>
                </td>
                <td class="text-left">
                    <?= Html::a($item->product->name, ['product/index', 'slug' => $item->product->slug]) ?>
                </td>
                <td>
                    <?= $item->name ?>
                </td>
                <td>
                    <?= Html::textInput('Count[]', $cart[$item->id], ['class' => 'form-control text-center form-control-sm product-count', 'size' => 1, 'data-id' => $item->id, 'data-price' => $item->priceDef]) ?>
                </td>
                <td>
                    <a href="#" class="btn btn-link btn-sm text-danger product-delete" rel="<?= $item->id ?>"><iconify-icon icon="ri:delete-back-2-line" ></iconify-icon></a>
                </td>
                <td>
                    <?= $item->priceDef ?>
                </td>
                <td class="sum"></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="text-right">
    <?= Yii::t('app', 'Total amount') ?>: <b><?= $items[0]->currencyDef->before . '<span class="total">0</span> ' . $items[0]->currencyDef->after ?></b>
</div>
<?php else: ?>
<div class="alert alert-warning">
    <?= Yii::t('app', 'Cart empty') ?>
</div>
<?php endif; ?>