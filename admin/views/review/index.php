<?php

use app\admin\models\Review;
use admin\modules\sortable\grid\SortableColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\admin\models\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reviews');
$this->params['breadcrumbs'][] = $this->title;

if (!Yii::$app->request->get('all') && $dataProvider->totalCount > $dataProvider->count) {
    $showAll = Html::a(Yii::t('app', 'Show all'), Url::current(['all' => 1]));
} else {
    $showAll = '';
}
?>

<div class="card card-info review-index">
    <div class="card-header">      
        <div class="card-actions">
            <?= Html::a("<i class='fas fa-plus'></i>&nbsp;" .Yii::t('app', 'Add Review'), ['create'], ['class' => 'btn btn-block bg-gradient-secondary btn-sm',
                  'title' => 'click to add new review']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
    <?= GridView::widget([
        'tableOptions' => ['class' => 'table table-hover text-nowrap'],
        'layout' => "{items}\n{pager}",
        //'showHeader' => false,        
        'filterPosition' => 'header',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            return [
                'data-position' => $model->position,
            ];
        },
        'layout' => "{summary}\n{$showAll}\n{items}\n{pager}",
        'columns' => [
            [
                'class' => SortableColumn::className(),
            ],
            [
                'attribute' => 'name',
                'content' => function($model, $key, $index, $column){
                    return Html::a($model->name, ['update', 'id' => $model->id]);
                }
            ],
            [
                'attribute' => 'product_id',
                'filterInputOptions' => [
                    'placeholder' => 'Product ID',
                    'class' => 'form-control',
                ],
                'content' => function(Review $model){
					if(!empty($model->product))
                    return Html::a($model->product->name, ['/product/index', 'slug' => $model->product->slug]);
                },
            ],
            'created_at:date',
            [
                'attribute' => 'answer',
                'filter' => [1 => 'No Response', 2 => 'With answer'],
                'content' => function($model, $key, $index, $column){
                    if ($model->answer) {
                        return Html::tag('i', '', ['class' => 'glyphicon glyphicon-ok']);
                    } else {
                        return 'No Response';
                    }
                },
            ],
            [
                'attribute' => 'status',
                'filter' => Review::statusList(),
                'content' => function($model, $key, $index, $column){
                    $statusList = Review::statusList();
                    $class = 'default';
                    if ($model->status == Review::STATUS_NEW) {
                        $class = 'danger';
                    } else if ($model->status == Review::STATUS_PUBLISHED) {
                        $class = 'success';
                    }
                    return '<span class="badge badge-' . $class . '">' . $statusList[$model->status] . '</span>';
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',//'{delete}',
            ],
        ],
        'options' => [
            'data' => [
                'sortable' => 1,
                'sortable-url' => Url::to(['sorting']),
            ]
        ],
    ]); ?>
    </div>
</div>