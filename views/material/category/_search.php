<?php

use app\models\Feature;
use app\models\Value;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductFilter */
/* @var $form yii\widgets\ActiveForm */
/* @var $page app\models\Category */
/* @var $features app\models\Feature[] */

?>

<?php if (count($features)) : ?>
    <?php
    $js = <<<JS
$('input[type="checkbox"]').change(function(){
    $(this).parents('form').submit();
});
JS;
    $this->registerJs($js);
    ?>
    <div class="product-search">

        <?php $form = ActiveForm::begin([
            'action' => Url::current(),
            'method' => 'get',
            'options' => [
                'class' => 'row',
                'data-pjax' => true,
            ],
        ]); ?>

        <?php foreach ($features as $key => $feature) : ?>
            <div class="col-sm-4 col-md-3">
                <?= $form->field($model, 'feature_ids[' . $feature->id . ']')->checkboxList(Value::getListEx($feature->id, $model->category_id), ['class' => 'filter-values'])->label($feature->name . ($feature->after ? ', ' . $feature->after : '')) ?>
            </div>
        <?php endforeach; ?>

        <?php ActiveForm::end(); ?>

    </div>
<?php endif; ?>