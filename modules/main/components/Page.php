<?php

namespace app\modules\main\components;

use Yii;
use yii\web\NotFoundHttpException;

class Page extends \common\modules\page\models\Page
{
    public static function viewPage3($id)
    {
        if (is_numeric($id)) {
            $page = self::findOne($id);
        } else {
            $page = self::findOne(['slug' => $id]);
        }

        if ($page === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        Yii::$app->view->params['page'] = $page;

        Yii::$app->view->title = $page->title;

        if ($page->description) {
            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => $page->description
            ], 'description');
        }

        if ($page->keywords) {
            Yii::$app->view->registerMetaTag([
                'name' => 'keywords',
                'content' => $page->keywords
            ], 'keywords');
        }

        if (Yii::$app->request->get('page')) {
            $page->title .= ' - ' . Yii::t('app', 'page {0}', Yii::$app->request->get('page'));
            $page->description .= ' - ' . Yii::t('app', 'page {0}', Yii::$app->request->get('page'));
            Yii::$app->view->title = $page->title;
            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => $page->description,
            ], 'description');
        }

        return $page;
    }
}