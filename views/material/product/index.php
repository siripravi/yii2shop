<?php
/* @var $this yii\web\View */
/* @var $model dench\products\models\Product */
/* @var $similar dench\products\models\Product[] */
/* @var $viewed boolean */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $reviewForm app\models\ReviewForm */
/* @var $rating array */

use app\widgets\OrderScheme;
use common\modules\image\helpers\ImageHelper;
use yii\helpers\Url;

echo $this->render('_breadcrumbs', [
    'model' => $model,
]);

$url_active = Url::to(['category/view', 'slug' => $model->categories[0]->slug]);

$js = <<<JS
$('.card').on('hidden.bs.collapse', function () {
  $(this).find('.fa').removeClass('fa-minus-square').addClass('fa-plus-square');
}).on('shown.bs.collapse', function () {
  $(this).find('.fa').removeClass('fa-plus-square').addClass('fa-minus-square');
});

$('.sidebar nav .nav-link[href="{$url_active}"]').addClass('active bg-gradient-primary text-white');
JS;

$this->registerJs($js);
?>

<div class="container-fluid">
<h1 class="mb-3"><?= $model->h1 ?></h1>
<?php if (!$model->enabled): ?>
    <div class="alert alert-info"><?= Yii::t('app', 'This item is disabled and visible only to admins. Google and all visitors get 404 error.') ?></div>
<?php endif; ?>

        <?= $this->render('_photo', [
            'model' => $model,
        ]) ?>
    
        <?= $this->render('_price', [
            'model' => $model,
            'rating' => $rating,
        ]) ?>
   

<?= $this->render('_text', [
    'name' => $model->name,
    'text' => $model->text,
]) ?>

<?= $this->render('_feature', [
    'model' => $model,
]) ?>

<?= $this->render('_files', [
    'model' => $model,
]) ?>

<?php if ($model->text_features) : ?>
    <div class="card my-3">
        <a class="card-header bg-dark text-white" id="headingTips" data-toggle="collapse" href="#collapseTips" aria-expanded="true" aria-controls="collapseText">
            <i class="fa fa-minus-square"></i><?= $model->getAttributeLabel('text_features') ?>
        </a>
        <div id="collapseTips" class="collapse show" aria-labelledby="headingTips" data-parent="#accordion">
            <div class="card-body">
                <?= $model->text_features ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($model->text_tips) : ?>
<div class="card my-3">
    <a class="card-header bg-dark text-white" id="headingTips" data-toggle="collapse" href="#collapseTips" aria-expanded="true" aria-controls="collapseText">
        <i class="fa fa-minus-square"></i><?= $model->getAttributeLabel('text_tips') ?>
    </a>
    <div id="collapseTips" class="collapse show" aria-labelledby="headingTips" data-parent="#accordion">
        <div class="card-body">
            <?= $model->text_tips ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($model->text_process) : ?>
    <div class="card my-3">
        <a class="card-header bg-dark text-white" id="headingProcess" data-toggle="collapse" href="#collapseProcess" aria-expanded="true" aria-controls="collapseText">
            <i class="fa fa-minus-square"></i><?= $model->getAttributeLabel('text_process') ?>
        </a>
        <div id="collapseProcess" class="collapse show" aria-labelledby="headingProcess" data-parent="#accordion">
            <div class="card-body">
                <?= $model->text_process ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($model->text_use) : ?>
    <div class="card my-3">
        <a class="card-header bg-dark text-white" id="headingUse" data-toggle="collapse" href="#collapseUse" aria-expanded="true" aria-controls="collapseText">
            <i class="fa fa-minus-square"></i><?= $model->getAttributeLabel('text_use') ?>
        </a>
        <div id="collapseUse" class="collapse show" aria-labelledby="headingUse" data-parent="#accordion">
            <div class="card-body">
                <?= $model->text_use ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($model->text_storage) : ?>
    <div class="card my-3">
        <a class="card-header bg-dark text-white" id="headingStorage" data-toggle="collapse" href="#collapseStorage" aria-expanded="true" aria-controls="collapseText">
            <i class="fa fa-minus-square"></i><?= $model->getAttributeLabel('text_storage') ?>
        </a>
        <div id="collapseStorage" class="collapse show" aria-labelledby="headingStorage" data-parent="#accordion">
            <div class="card-body">
                <?= $model->text_storage ?>
            </div>
        </div>
    </div>
<?php endif; ?>
PRODUCT OPTIONS
<?= $this->render('_options', [
    'options' => $model->options,
]) ?>

<div class="card my-3" id="reviews">
    <a class="card-header bg-dark text-white" id="headingReviews" data-toggle="collapse" href="#collapseReviews" aria-expanded="true" aria-controls="collapseReviews">
        <i class="fa fa-minus-square"></i><?= Yii::t('app', 'Product reviews') ?> (<!--?= $dataProvider->totalCount ?-->)
    </a>
    <div id="collapseReviews" class="collapse show" aria-labelledby="headingReviews" data-parent="#accordion">
        <div class="card-body">
            <?= $this->render('_reviews', [
                'model' => $reviewForm,
                'dataProvider' => $dataProvider,
            ]) ?>
        </div>
    </div>
</div>

<?= $this->render('_similar', [
    'similar' => $similar,
    'viewed' => $viewed,
]) ?>
</div>  
<?= OrderScheme::widget(['baseUrl' => $this->theme ? $this->assetManager->getBundle(app\site\assets\SiteAsset::class)->baseUrl : null]) ?>

<!--?= $rating['value'] ?--><!--?= //$rating['count'] ?-->
<script type='application/ld+json'>
{
    "@context": "http://www.schema.org",
    "@type": "product",
    "name": "<?= $model->name ?>",
    "image": "<?= $model->image ? Url::to(ImageHelper::thumb($model->image->id, 'normal'), true) : null ?>",
    "description": "<?= $model->description ?>",
    "offers": {
        "@type": "Offer",
        "availability": "http://schema.org/InStock",
        "price": "<?= $model->priceDef ?>",
        "priceCurrency": "UAH"
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": 4,
        "reviewCount": 5
    }
}
</script>
