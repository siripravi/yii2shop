TABLE DATA
<?php
use app\helpers\ImageHelper;
use yii\helpers\Html;
/*echo $this->render('_table', [
    'items' => $items,
    'cart' => $cart,
]);**/

?>

<?= app\modules\cart\widgets\CartWidget::widget();  ?>