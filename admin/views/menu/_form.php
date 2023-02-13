<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
    <div class="card card-primary review-form">
        <div class="card-header">
            <div class="card-title ">                
            </div>
            <div class="card-tools">
                <?= Html::submitButton(($model->isNewRecord) ? "<i class='fas fa-save'></i> Create" : "<i class='fas fa-save'></i> Update", ['class' => 'btn btn-lg btn-flat btn-warning']) ?>
            </div>    
        </div>
        <div class="card-body">    
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'enabled')->checkbox() ?>            
        </div>
    </div>
<?php ActiveForm::end(); ?>


