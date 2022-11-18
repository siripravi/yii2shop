<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\admin\models\Setting */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Setting',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="setting-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
