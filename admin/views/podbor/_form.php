<?php

use app\admin\models\Podbor;
use admin\modules\language\models\Language;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\admin\models\Podbor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="podbor-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-actions ml-auto p-2 text-right">
                <?= Html::submitButton(Yii::t('app', '<i class="fas fa-save"></i>&nbsp;Save'), ['class' => 'btn btn-block bg-gradient-primary']) ?>
    </div>  
    <div class="card card-warning card-tabs">
        <div class="card-header">           
            <ul class="full-width-tabs nav nav-tabs">
                <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                    <li class="nav-item use-max-space"><a href="#lang<?= $suffix ?>-tab" class="nav-link<?= empty($suffix) ? ' active': '' ?>" data-bs-toggle="tab"><?= $name ?></a></li>
                <?php endforeach; ?>
                <li class="nav-item use-max-space"><a href="#tab-main" class="nav-link" data-bs-toggle="tab"><?= Yii::t('app', 'Main') ?></a></li>
            </ul>                   
        </div>
        <div class="card-body">
            <div class="tab-content">
                <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                    <div class="tab-pane fade<?php if (empty($suffix)) echo ' show active'; ?>" id="lang<?= $suffix ?>-tab">
                        <?= $form->field($model, 'name' . $suffix)->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'title' . $suffix)->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'text' . $suffix)->widget(CKEditor::className(), [
                            'preset' => 'full',
                            'clientOptions' => [
                                'customConfig' => '/js/ckeditor.js',
                                'language' => Yii::$app->language,
                                'allowedContent' => true,
                                'enterMode' => 2,
                            ]
                        ]) ?>
                    </div>
                <?php endforeach; ?>

                <div class="tab-pane fade" id="tab-main">
                    <?= $form->field($model, 'parent_id')
                        ->dropDownList(Podbor::getList(true), [
                            'prompt' => '',
                            'options' => [
                                $model->id => [
                                    'disabled' => true,
                                ],
                            ],
                        ]) ?>

                    <?= $form->field($model, 'product_ids')
                        ->checkboxList(Podbor::getProductList(true))
                        ->label(Yii::t('app', 'Products')) ?>

                    <?= $form->field($model, 'enabled')->checkbox() ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<style>
    #podbor-product_ids {
        max-height: 500px;
        overflow-y: auto;
        border: 1px solid #ccc;
    }
    #podbor-product_ids label {
        display: block;
        border-bottom: 1px solid #eee;
        padding: 0 5px;
    }
    #podbor-product_ids label:hover {
        color: #666;
    }
</style>