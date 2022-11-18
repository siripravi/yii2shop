<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 20.05.17
 * Time: 17:54
 *
 * @var $this yii\web\View
 * @var $form yii\bootstrap5\ActiveForm
 * @var $modelVariant admin\modules\products\models\Variant
 * @var $index integer
 */

use admin\modules\products\models\Currency;
use admin\modules\products\models\Unit;
use admin\modules\language\models\Language;
use yii\helpers\Html;

?>
<?php
if (!$modelVariant->isNewRecord) {
    echo Html::activeHiddenInput($modelVariant, "[{$index}]id");
}
?>

    <div class="card card-default">
        <div class="card-header">
            <div class="col-12">
                <?= Html::button("<i class='fas fa-trash'></i>", ['class' => 'btn btn-default remove-variant']) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                    <div class="col-md-12">
                        <?= $form->field($modelVariant, '['. $index . ']name' . $suffix)->textInput(['maxlength' => true]) ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-6">                    
                    <?= $form->field($modelVariant, '['. $index . ']price')->textInput() ?>
                    <?= $form->field($modelVariant, '['. $index . ']price_old')->textInput() ?>
                    <?= $form->field($modelVariant, '['. $index . ']currency_id')->dropDownList(Currency::getList(true)) ?>
                  
                </div>
                <div class="col-6">                
                    <?= $form->field($modelVariant, '['. $index . ']code')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($modelVariant, '['. $index . ']available')->textInput()->label($modelVariant->getAttributeLabel('available') . ' <i class="fas fa-question-sign" data-toggle="tooltip" title="(1) в наличии, (0) нет в наличии, (-1) под заказ"></i>') ?>
                    <?= $form->field($modelVariant, '['. $index . ']unit_id')->dropDownList(Unit::getList(true)) ?>
                </div>
                <div class="row">
                    <div class="col-6 p-4 text-right">                    
                        <?= $form->field($modelVariant, '['. $index . ']enabled')->checkbox() ?>                         
                    </div>
                </div>
            </div>
        </div>
    </div>


