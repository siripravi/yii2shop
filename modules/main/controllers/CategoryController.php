<?php

namespace app\modules\main\controllers;

use app\modules\main\components\Category;
use app\modules\main\components\Page;
use common\modules\products\models\Feature;
use common\modules\products\models\Product;
use common\modules\products\models\ProductFilter;
use Yii;
use yii\data\ActiveDataProvider;
use app\modules\main\components\BaseController;
use yii\web\NotFoundHttpException;

class CategoryController extends BaseController
{
    public function actionIndex()
    {
        if (!$page = Page::viewPage("category",true)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $categories = !Yii::$app->cache->exists('_categories-' . Yii::$app->language) ? Category::getMain() : [];

        $query = Product::find();
        $query->joinWith(['categories']);
        $query->andWhere(['nxt_product.enabled' => true]);
        $query->andWhere(['nxt_category.enabled' => true]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => [
                    'position' => SORT_DESC,
                ],
            ],
            'pagination' => [
                'forcePageParam' => false,
                'pageSizeParam' => false,
                'pageSize' => 12,
            ],
        ]);

        return $this->render('index', [
            'page' => $page,
            'categories' => $categories,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPod($slug)
    {
        $page = Category::viewPage($slug,true);

        /** @var $category Category */
        $category = Category::find()->where(['slug' => $slug])->one();

        $categories = $category->categories;

        return $this->render('pod', [
            'page' => $page,
            'categories' => $categories,
        ]);
    }

    public function actionView($slug)
    {
        $page = Category::viewPage($slug,true);

        if (!empty(Yii::$app->params['templateTitleCategory_' . Yii::$app->language])) {
            $page->title = str_replace('{0}', $page->h1, Yii::$app->params['templateTitleCategory_' . Yii::$app->language]);

            if (empty($model->description)) {
                $page->description = str_replace('{0}', $page->h1, Yii::$app->params['templateDescriptionCategory_' . Yii::$app->language]);
            }

            Yii::$app->view->title = $page->title;
            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => $page->description
            ], 'description');
        }

        $this->view->params['category_ids'] = [$page->id];

        $searchModel = new ProductFilter(['category_id' => $page->id, 'enabled' => true]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $features = Feature::getFilterList(true, [$searchModel->category_id]);

        return $this->render('view', [
            'page' => $page,
            'categories' => $page->categories,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'features' => $features,
        ]);
    }

}
