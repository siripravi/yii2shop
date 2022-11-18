<?php

use app\admin\models\Question;
use admin\modules\products\models\Product;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\admin\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal']       
        ]); ?>
    <div class="card card-info review-form">
        <div class="card-header d-flex">           
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<i class="fas fa-plus"></i>&nbsp;Submit Review') : Yii::t('app', '<i class="fas fa-save"></i>&nbsp;Submit Review'), ['class' => $model->isNewRecord ? 'btn btn-block bg-gradient-info btn-sm' : 'btn btn-block bg-gradient-info btn-sm',
                'title' => 'click to submit data']) ?>          
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <?= $form->field($model, 'product_id',[
                             //'template' => "{label}\n"."<div class='col-sm-10'>"."{input}"."</div>\n{hint}\n{error}",
                             'options'=>['class' =>'form-group bmd-form-group'],
                             'labelOptions'=>['class'=>'bmd-label-static']])                   
                            ->dropDownList(Product::getList(null), ["title"=>"Product",'prompt' => 'select one product','class'=>'custom-select form-control-border border-width-2'])
                            ->label("");
                            ?>
                </div>
                <div class="col-3">
                    <?= $form->field($model, 'rating',[
                      'options'=>['class' =>'form-group bmd-form-group'],
                      'labelOptions'=>['class'=>'bmd-label-static']])       
                    
                    ->dropDownList([0,1,2,3,4,5], ["title"=>"Rating",'prompt' => 'select rating ','class'=>'custom-select form-control-border border-width-2'])
                    ->label("");
                    ?>
                </div>
                <div class="col-3">
                <?= $form->field($model, 'status',[
                'options'=>['class' =>'form-group bmd-form-group'],
                'labelOptions'=>['class'=>'bmd-label-static']]) 
                ->dropDownList(Question::statusList(), ["title"=>"Status",'prompt' => 'select one ','class'=>'custom-select form-control-border border-width-2'])
                ->label(""); ?>
                </div>
            </div>    
            <div class="row">
                <div class="col-6">
                <?= $form->field($model, 'name',[                    
                    'template' => "{label}\n"."<div class='col-sm-10'>"."{input}"."</div>\n{hint}\n{error}",
                    'options'=>['class' =>'form-group row bmd-form-group'],'labelOptions'=>['class'=>'col-sm-2 col-form-label bmd-label-static']])
                    ->textInput(['maxlength' => true, 'placeholder' => 'Your Name'])->label("") ?>

                </div>
                <div class="col-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>              
            </div>    
                
                <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

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


