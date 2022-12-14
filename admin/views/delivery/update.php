<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model dench\cart\models\Delivery */

$this->title = Yii::t('app', 'Update Delivery: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Deliveries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="delivery-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
