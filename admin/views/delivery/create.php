<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model dench\cart\models\Delivery */

$this->title = Yii::t('app', 'Create Delivery');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Deliveries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
