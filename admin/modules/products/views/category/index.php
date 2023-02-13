<?php

use admin\modules\sortable\grid\SortableColumn;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel admin\modules\products\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;

if (!Yii::$app->request->get('all') && $dataProvider->totalCount > $dataProvider->count) {
    $showAll = Html::a(Yii::t('app', 'Show all'), Url::current(['all' => 1]));
} else {
    $showAll = '';
}
?>

<div class="card h-100 shadow border-0 pl-3">
    <div class="card-header">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">    
            <?= Html::a(Yii::t('app', '<i class="fas fa-plus"></i> Create {0}', Yii::t('app', 'Product')), ['create'], ['class' => 'btn btn-success btn-flat float-right']) ?>
        </div>
    </div>
    <?= ListView::widget([       
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'row gx-5'
        ],
       
        'pager' => [
            'class' => yii\bootstrap5\LinkPager::class,
            'options' => ['class'=>'pagination justify-content-center'],
            'linkContainerOptions' => ['class' => 'page-item p-2 rounded']
        ],
        'itemOptions' => [
                'class' => 'col-md-3'
            ],
      
        'layout' => '<div class="row text-center p-3">{pager}</div><div class="row p-3">{items}</div>{pager}',
        'itemView' => '_category_item',       
        'options' => [
            'data' => [
                'sortable' => 1,
                'sortable-url' => Url::to(['sorting']),
            ]
        ],
    ]); ?>
</div>