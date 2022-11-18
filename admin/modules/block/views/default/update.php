<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model dench\block\models\Block */

$this->title = Yii::t('block', 'Update {modelClass}: ', [
    'modelClass' => 'Block',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('block', 'Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('block', 'Update');
?>
<div class="block-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
