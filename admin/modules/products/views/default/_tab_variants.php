<?Php

use admin\modules\products\widgets\DynamicFormWidget;
use yii\helpers\Html;
?>

<?php

            $formFields = [
                'price',
                'price_old',
                'currency_id',
                'code',
                'available',
                'unit_id',
                'enabled',

                'image_ids',
                'files',
            ];

            foreach ($lsList as $suffix => $name) {
                $formFields[] = 'name' . $suffix;
            }

            DynamicFormWidget::begin([
                'widgetContainer' => 'variantsWrapper',
                'widgetBody' => '.variant-items',
                'widgetItem' => '.variant-item',
                'limit' => 99,
                'min' => 1,
                'insertButton' => '.add-variant',
                'deleteButton' => '.remove-variant',
                'model' => current($modelsVariant),
                'formId' => 'product-form',
                'formFields' => $formFields,
            ]); ?>
            <div class="p-4">
                <?= Html::button(Yii::t('app', 'Add variant'), ['class' => 'btn btn-default add-variant']) ?>
            </div>
           
                <div class="row variant-items">
                    <?php foreach ($modelsVariant as $index => $modelVariant) : ?>
                        <div class="col-4 variant-item" data-position="<?= $modelVariant->position ?>" data-key="<?= $modelVariant->id ?>">
                            <?= $this->render('_form_variant', [
                                'form' => $form,
                                'modelVariant' => $modelVariant,
                                'index' => $index,
                            ]) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            
            

            <?php DynamicFormWidget::end(); ?>