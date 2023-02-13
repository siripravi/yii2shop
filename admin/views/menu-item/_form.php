<?php

use app\admin\models\Menu;
use app\admin\models\MenuItem;
use admin\modules\language\models\Language;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\admin\models\MenuItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-item-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card  border-secondary mb-3 col-6">
        <div class="card-header d-flex p-1">
            <div class="card-title p-3">Fill the Info</div>
            <ul class="nav nav-tabs  nav-fill ml-auto p-0">
                <li class="nav-item"><a href="#main-tab" class="nav-link" data-bs-toggle="tab">Main</a></li>
                <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                    <li class="nav-item">
                        <a href="#lang<?= $suffix ?>" class="nav-link <?= empty($suffix) ? ' active': '' ?>" data-bs-toggle="tab"><?= $name ?></a>
                    </li>
                <?php endforeach; ?>                
            </ul>
            <div class="form-groupd-grid gap-2 col-4 mx-auto pt-3">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-info']) ?>
            </div>
        </div>
        <div class="card-body">    
            <?= $form->field($model, 'menu_id')->dropDownList(Menu::dropDownList()) ?>
            <?= $form->field($model, 'parent_id')->dropDownList(MenuItem::dropDownList(), ['prompt' => '']) ?>
            <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'enabled')->checkbox() ?>
        </div> 
    </div>
    <?php ActiveForm::end(); ?>        
</div>
