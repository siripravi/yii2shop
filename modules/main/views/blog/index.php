<?php
/**
 * Project: yii2-page for internal using
 * Author: common\modules
 * Copyright (c) 2018.
 */

use common\modules\page\Module;
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\bootstrap5\Breadcrumbs;
//\common\modules\page\assets\AppAsset::register($this);

$this->title = Yii::t('page', 'page');
Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => Yii::$app->name . ' ' . Yii::t('page', 'page')
]);
Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' => Yii::$app->name . ', ' . Yii::t('page', 'page')
]);

if (Yii::$app->get('opengraph', false)) {
    Yii::$app->opengraph->set([
        'title' => $this->title,
        'description' => Yii::t('page', 'page'),
        //'image' => '',
    ]);
}
//$this->params['breadcrumbs'][] = '文章';

/*$this->breadcrumbs=[
    //$post->category->title => Yii::app()->createUrl('post/category', array('id'=>$post->category->id, 'slug'=>$post->category->slug)),
    '文章',
];*/

$parent_id = null;

if (isset($dataProvider->models[0]->parent)) {
    $this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Pages'), 'url' => ['index']];
    if (isset($dataProvider->models[0]->parent->parent)) {
        $this->params['breadcrumbs'][] = ['label' => $dataProvider->models[0]->parent->parent->name, 'url' => ['index', 'PageSearch[parent_id]' => $dataProvider->models[0]->parent->parent->id]];
    }
    $this->title = $dataProvider->models[0]->parent->name;
    $parent_id = $dataProvider->models[0]->parent->id;
} else {
    $this->title = Yii::t('page', 'Pages');
}
$this->params['breadcrumbs'][] = $this->title;

if (!Yii::$app->request->get('all') && $dataProvider->totalCount > $dataProvider->count) {
    $showAll = Html::a(Yii::t('app', 'Show all'), Url::current(['all' => 1]));
} else {
    $showAll = '';
}
?>

<div class="<?= $this->context->secClass;?>">
				<div class="container">

 
<div class="page-index__header">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    
                </div>
                <div class="col-md-5">
                    <div class="page-index__search">
                        <?= \yii\widgets\Menu::widget([
                            'items' => $cat_items,
                            'options' => [
                                'class' => 'page-index__cat'
                            ]
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    
    <section class="py-5">
        <div class="container px-5">
           
                <?php
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_brief',
                    'options' => [
                        'class' => 'row gx-5'
                    ],
					'pager'=>[
					 'linkOptions' => ['class'=>'pagination justify-content-center']],
					'itemOptions' => [
                'class' => 'col-lg-4 mb-5'
            ],
                    'layout' => '{items}{pager}{summary}'
                ]);
                ?>
             
        </div>
    </section>
</div>
</div>


