<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menu');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-primary podbor-index">
    <div class="card-header"> 
    <?= Html::a(Yii::t('app', 'Create Menu'), ['create'], ['class' => 'btn btn-block bg-gradient-secondary btn-sm']) ?>
    </div>
    <div class="card-body">   
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'name',
                    'content' => function($data) {
                        return Html::a($data->name, ['menu-item/index', 'MenuItemSearch[menu_id]' => $data->id]);
                    }
                ],
                [
                    'attribute' => 'enabled',
                    'content' => function($model, $key, $index, $column){
                        if ($model->enabled) {
                            $class = 'glyphicon glyphicon-ok';
                        } else {
                            $class = '';
                        }
                        return Html::tag('i', '', ['class' => $class]);
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
    </div>
</div>
