<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model dench\block\models\Block */

$this->title = Yii::t('block', 'Create Block');
$this->params['breadcrumbs'][] = ['label' => Yii::t('block', 'Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
