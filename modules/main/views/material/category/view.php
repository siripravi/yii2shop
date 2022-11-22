<?php
/* @var $this yii\web\View */
/* @var $page app\modules\main\components\Category */
/* @var $categories app\modules\main\components\Category[] */
/* @var $products dench\products\models\Product[] */
/* @var $searchModel dench\products\models\ProductFilter */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $features dench\products\models\Feature[] */

use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Products'),
    'url' => ['category/index'],
];

if ($page->parent) {
    $url_active = Url::to(['category/pod', 'slug' => $page->parent->slug]);
    $this->params['breadcrumbs'][] = [
        'label' => Yii::t('app', $page->parent->name),
        'url' => $url_active,
    ];
} else {
    $url_active = Url::to(['category/view', 'slug' => $page->slug]);
}

$this->params['breadcrumbs'][] = $page->name;

$js = <<<JS
    $('.sidebar nav .nav-link[href="{$url_active}"]').addClass('active bg-gradient-primary text-white');
JS;
$this->registerJs($js);
?>
<h1 class="mb-3"><?= $page->h1 ?></h1>

<?php if ($page->text) : ?>
<div class="card mb-3">
    <div class="card-body">
        <?= $page->text ?>
    </div>
</div>
<?php endif; ?>

<?php Pjax::begin(['id' => 'pjax']); ?>
   <!--
    <= $this->render('_search', [
        'model' => $searchModel,
        'page' => $page,
        'features' => $features])
    >
	-->

    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
         'layout' => '<div class="row">{items}</div>',
        'emptyTextOptions' => [
            'class' => 'alert alert-danger',
        ],
        /*'options' => [
            'class' => 'list-group mb-4',
        ],*/
        'itemOptions' => [
            'class' => 'col-md-6 col-lg-4  g-2',
        ],
    ]); 
    ?>
	


<!--?php Pjax::end(); ?-->

<?php if (!Yii::$app->request->get('page') && $page->seo) : ?>
    <div class="card mb-3">
        <div class="page-seo card-body">
            <?= $page->seo ?>
        </div>
    </div>
<?php endif; ?>