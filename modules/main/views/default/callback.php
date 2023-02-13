<?php
/**
 * @var $this yii\web\View
 * @var $form yii\bootstrap5\ActiveForm
 * @var $model app\modules\main\models\ContactForm
 */

use app\modules\main\components\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha2;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

<?= $form->field($model, 'name')->textInput() ?>

<?= $form->field($model, 'phone') ?>

<?= $form->field($model, 'reCaptcha')->widget(ReCaptcha2::class)->label(false) ?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'callback-button']) ?>
</div>

<?php ActiveForm::end(); ?>

