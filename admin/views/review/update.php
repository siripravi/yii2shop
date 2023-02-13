<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\admin\models\Review */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Review',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

