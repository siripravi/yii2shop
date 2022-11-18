<?php

use admin\modules\products\models\Category;
use admin\modules\image\widgets\ImagesForm;
use admin\modules\language\models\Language;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Tabs;

/* @var $this yii\web\View */
/* @var $model admin\modules\products\models\Category */
/* @var $form yii\bootstrap5\ActiveForm */
/* @var $images admin\modules\image\models\Image[] */

$js = '';

foreach (Language::suffixList() as $suffix => $name) {

    $js .= "
var name" . $suffix . " = '';
$('#category-name" . $suffix . "').focus(function(){
    name" . $suffix . " = $(this).val();
}).blur(function(){
    var h1 = $('#category-h1" . $suffix . "');
    if (h1.val() == name" . $suffix . ") {
        h1.val($(this).val());
    }
    var title = $('#category-title" . $suffix . "');
    if (title.val() == name" . $suffix . ") {
        title.val($(this).val());
    }
});";

}

$this->registerJs($js);
?>
<?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
        'validateOnChange' => true,
        'validateOnBlur' => false,
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'product-form',
        ]
    ]); ?>
    <div class="card card-primary">
        <div class="row p-2">
            <div class="col-8 justify-content-start">
                <h3 class="card-title"><?= $model->isNewRecord ? "Add New Category": $model->title;?></h3>
            </div>    
            <div class="col-4 justify-content-end">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : "<i class='fas fa-save'></i>&nbsp;" .Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg btn-warning' : 'btn btn-lg btn-warning']) ?>
            </div>
        </div>    
        <div class="card-body"> 
            <?php  
                $lsList = Language::suffixList();
            
                foreach ( $lsList as $suffix => $name){
                $items[] = [
                        'label' => $name,
                        'content' => $this->render("_tab".$suffix,['model'=>$model,'suffix'=>$suffix,'form'=>$form]),
                        'active' => empty($suffix)
                    ];
                }
                $items[] = [
                        'label' => 'Main',
                        'content' => $this->render("_tab_main",['model'=>$model,'form'=>$form]),
                        
                    ];
                
                    
                $items[] = [
                        'label' => 'Images',
                        'content' => $this->render("_tab_images",['model'=>$model,'form'=>$form,'images'=>$model->images]),
                        
                    ];       
                
                ?> 
            
                <?php
                    echo Tabs::widget([
                        'navType' => 'nav-pills card-header full-width-tabs',
                        'items' =>  $items,
                        'tabContentOptions' =>['class'=>'card-body p-4'],
                        'itemOptions' => ['class'=>'card-body'],
                        'headerOptions' => ['class'=>'use-max-space']
                        
                    ]);  
                ?>
        </div>
  <!-- /.card-body -->
  <div class="card-footer">
    *Please fill all the required information ad click the button on right top.
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->
<?php ActiveForm::end(); ?>