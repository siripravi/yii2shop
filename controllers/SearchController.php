<?php

namespace app\controllers;

use app\modules\page\models\Page;
use app\models\Category;
use app\models\Product;
use app\models\Variant;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;

class SearchController extends Controller
{
    public function actionIndex($query)
    {
        $page = Page::viewPage('search',true);

        $exp = explode(' ', $query);

        $query = Product::find()->joinWith(['translations'])->where(['enabled' => 1]);

        foreach ($exp as $e) {
            $query->andWhere(['or', ['like', 'name', $e], ['like', 'text', $e]]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => [
                    'position' => SORT_DESC,
                ],
            ],
        ]);

        return $this->render('index', [
            'page' => $page,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionList($q = null)
    {
        $q = trim($q);

        $data = Product::find()->select(['id', 'name', 'slug', 'text'])->joinWith(['translations'])->where(['enabled' => 1])->andFilterWhere(['or', ['like', 'name', $q], ['like', 'text', $q]])->asArray()->limit(100)->all();

        $out = [];

        foreach ($data as $d) {
            $text = '';
            if ($d['text'] && $q) {
                if (!mb_stripos(' '.$d['name'], $q, 0, 'UTF-8') && ' '.mb_stripos($d['text'], $q, 0, 'UTF-8')) {
                    $text = ' ' . $q;
                }
            }
            $out[] = [
                'value' => $d['name'] . $text,
                'link' => Url::to(['product/index', 'slug' => $d['slug']]),
            ];
        }

        $data = Category::find()->select(['id', 'name', 'slug', 'parent_id'])->joinWith(['translations'])->where(['enabled' => 1])->andFilterWhere(['like', 'name', $q])->asArray()->all();

        foreach ($data as $d) {
            if ($d['parent_id']) {
                $out[] = [
                    'value' => $d['name'],
                    'link' => Url::to(['category/pod', 'slug' => $d['slug']]),
                ];
            } else {
                $out[] = [
                    'value' => $d['name'],
                    'link' => Url::to(['category/view', 'slug' => $d['slug']]),
                ];
            }
        }

        return Json::encode($out);
    }

    public function actionProductList()
    {
        $data = [];

        $products = Product::find()->where(['enabled' => true])->all();
        foreach ($products as $product) {
            $variants = Variant::find()->where(['enabled' => true])->andWhere(['product_id' => $product->id])->all();
            foreach ($variants as $variant) {
                $data[] = [
                    'id' => $variant->id,
                    'value' => $product->name . ", " . $variant->name,
                    'price' => $variant->price,
                ];
            }
        }

        return Json::encode($data);
    }

}
