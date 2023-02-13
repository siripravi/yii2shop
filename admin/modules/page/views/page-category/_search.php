<?php
/**
 * Project: yii2-page for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use akiraz2\page\Module;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model akiraz2\page\models\pageCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'banner') ?>

    <?php // echo $form->field($model, 'is_nav') ?>

    <?php // echo $form->field($model, 'sort_order') ?>

    <?php // echo $form->field($model, 'page_size') ?>

    <?php // echo $form->field($model, 'template') ?>

    <?php // echo $form->field($model, 'redirect_url') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('page', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('page', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
