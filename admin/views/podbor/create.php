<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\admin\models\Podbor */

$this->title = Yii::t('app', 'Create Podbor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Selection'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
   <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

