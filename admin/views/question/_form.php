<?php

use app\admin\models\Question;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\admin\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="card card-primary review-form">
    <div class="card-header">       
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">             
            <?= Html::submitButton($model->isNewRecord ? "<i class='fas fa-save'></i>&nbsp;" .Yii::t('app', 'Create') : "<i class='fas fa-save'></i>&nbsp;" .Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-md btn-warning' : 'btn btn-warning']) ?>
        </div>
    </div>
    <div class="card-body">    
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'status')->dropDownList(Question::statusList()) ?>
            </div>
        </div>
       
        <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'answer')->widget(CKEditor::className(), [
                        'preset' => 'full',
                        'clientOptions' => [
                            'customConfig' => '/js/ckeditor.js',
                            'language' => Yii::$app->language,
                            'allowedContent' => true,
                        ]
        ]) ?>                    
        <!--?= $form->field($model, 'created_at')->textInput()->label('Создан (unixtime)') ?-->
    </div>
</div>           
<?php ActiveForm::end(); ?>


