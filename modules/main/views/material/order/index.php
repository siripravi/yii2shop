<?php
/**
 * @var $this yii\web\View
 * @var $order \common\modules\cart\models\Order
 * @var $items \common\modules\cart\models\OrderProduct[]
 * @var $page \common\modules\page\models\Page
 */

use common\modules\cart\models\Order;
use common\modules\cart\models\Payment;
use common\modules\cart\widgets\LiqPay;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = Yii::t('app', 'Order #{order_id}', ['order_id' => $order->id]);

$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->session->hasFlash('orderSubmitted')) {
    $products = [];

    foreach ($order->orderProducts as $product) {
        $products[] = "{
    'sku': '{$product->variant->product_id}',
    'name': '{$product->variant->product->name}, {$product->variant->name}',
    'category': '{$product->variant->product->categories[0]->name}',
    'price': '{$product->variant->price}',
    'quantity': '{$product->count}'
}";
    }

    $transactionProducts = implode(',', $products);

    $js = <<<JS
dataLayer = [{
    'transactionId': '{$order->id}',
    'transactionTotal': '{$order->amount}',
    'transactionProducts': [{$transactionProducts}]
}];
JS;
    $this->registerJs($js, \yii\web\View::POS_HEAD);
}
?>
<h1 class="mb-3"><?= $this->title ?></h1>

<?php
$statusList = Order::statusList();
$awaiting = Yii::$app->params['liqpay']['status_awaiting'];
$call =  '<p>' . Yii::t('app', 'Order is accepted. Soon our employee will contact you to clarify information.') . '</p>';
echo '<div class="alert alert-' . (in_array($order->status, [Order::STATUS_COMPLETED, Order::STATUS_PAID]) ? 'success' : 'info') . '">' . $call . Yii::t('app', 'Current order status') . ': <b>' . $statusList[$order->status] . '</b></div>';
?>

<?= $page->short ?>

<div class="table-responsive">
    <table class="table table-bordered bg-white text-center align-middle table-cart">
        <tbody>
        <tr class="active">
            <th>№</th>
            <th><?= Yii::t('app', 'Product name') ?></th>
            <th><?= Yii::t('app', 'Count') ?></th>
            <th><?= Yii::t('app', 'Price per unit') . ', ' . $items[0]->variant->currencyDef->before . $items[0]->variant->currencyDef->after ?></th>
            <th><?= Yii::t('app', 'Amount') . ', ' . $items[0]->variant->currencyDef->before . $items[0]->variant->currencyDef->after ?></th>
        </tr>
        <?php foreach ($items as $k => $item) : ?>
            <tr>
                <td><?= $k + 1 ?></td>
                <td class="text-left">
                    <?= Html::a($item->name, ['product/index', 'slug' => $item->variant->product->slug]) ?>
                </td>
                <td>
                    <?= $item->count ?>
                </td>
                <td>
                    <?= $item->price ?>
                </td>
                <td>
                    <?= $item->count * $item->price ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="text-right">
    <?= Yii::t('app', 'Total amount') ?>: <span class="total h4"><?= $order->amount ?></span> <?= $items[0]->variant->currencyDef->before . $items[0]->variant->currencyDef->after ?>
</div>

<div class="text-center">
    <?php
    if ($order->status === Order::STATUS_AWAITING) {
        if ($order->paymentMethod->type === Payment::TYPE_LIQPAY) {
            echo LiqPay::widget([
                'amount' => $order->amount,
                'currency' => $items[0]->variant->currencyDef->code,
                'order_id' => $order->id . '-' . time(),
                'description' => Yii::t('app', 'Order #{order_id}', ['order_id' => $order->id]),
                'result_url' => Url::to(['/order', 'id' => $order->id, 'hash' => md5($order->id . Yii::$app->params['order_secret'])], true),
                'server_url' => Url::to(['/liqpay'], true),
                'sandbox' => Yii::$app->params['liqpay']['sandbox'],
            ]);
        } elseif ($order->paymentMethod->type === Payment::TYPE_WFP) {
            echo Yii::$app->wfp->button($order, Url::current());
        }
    }
    ?>
</div>

<?= DetailView::widget([
    'model' => $order,
    'options' => [
        'class' => 'table bg-white table-condensed table-bordered detail-view',
        'style' => 'margin-top: 30px;',
    ],
    'attributes' => [
        [
            'label' => Yii::t('app', 'Payment method'),
            'value' => $order->payment_id ? $order->paymentMethod->name : null,
        ],
        [
            'label' => Yii::t('app', 'Delivery method'),
            'value' => $order->delivery_id ? $order->deliveryMethod->name : null,
        ],
        'delivery',
        'created_at:datetime',
        [
            'label' => Yii::t('app', 'Order full name'),
            'value' => $order->buyer->name,
        ],
        'phone',
        'email',
        'comment',
    ],
]); ?>

<?= $page->text ?>
