<?php

namespace app\modules\main\controllers;

use app\modules\main\models\CallbackForm;
use app\modules\main\models\Question;
use app\modules\main\models\QuestionForm;
use app\modules\main\models\Review;
use app\modules\main\models\ReviewForm;
use common\modules\block\traits\BlockTrait;
use common\modules\page\models\Page;
use common\modules\products\models\Category;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use app\modules\main\components\BaseController;
use app\modules\main\models\ContactForm;
use yii\web\Response;

class DefaultController extends BaseController
{
    use BlockTrait;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $page = Page::viewPage("welcome",true);

        $categories = !Yii::$app->cache->exists('_categories-' . Yii::$app->language) ? Category::getMain() : [];

        return $this->render('index', [
            'page' => $page,
            'categories' => $categories,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContacts()
    {
        $page = Page::viewPage("contact",true);

        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['toEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->redirect(Url::current(['#' => 'feedback']));
        }
        return $this->render('contacts', [
            'page' => $page,
            'model' => $model,
        ]);
    }

    /**
     * Displays page.
     *
     * @return string
     */
    public function actionPage($slug)
    {
        $page = Page::viewPage($slug,true);

        return $this->render('page', [
            'page' => $page,
        ]);
    }

    /**
     * Displays how page.
     *
     * @return string
     */
    public function actionHow()
    {
        $page = Page::viewPage("how",true);

        return $this->render('how', [
            'page' => $page,
        ]);
    }

    /**
     * Displays questions page.
     *
     * @return string
     */
    public function actionQuestions()
    {
        $page = Page::viewPage('faq',true);

        $model = new QuestionForm();

        if ($model->load(Yii::$app->request->post()) && $model->send()) {
            Yii::$app->session->setFlash('questionSubmitted');
            return $this->redirect(['', '#' => 'card-form']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Question::find()->where(['status' => Question::STATUS_PUBLISHED]),
            'sort' => [
                'defaultOrder' => [
                    'position' => SORT_DESC
                ],
            ],
        ]);

        return $this->render('questions', [
            'page' => $page,
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionReviews()
    {
        $page = Page::viewPage('reviews',true);

        $model = new ReviewForm();

        if ($model->load(Yii::$app->request->post()) && $model->send()) {
            Yii::$app->session->setFlash('reviewSubmitted');
            return $this->redirect(['', '#' => 'card-form']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Review::find()
                ->where(['status' => Review::STATUS_PUBLISHED])
                ->andWhere(['product_id' => null]),
            'sort' => [
                'defaultOrder' => [
                    'position' => SORT_DESC
                ],
            ],
        ]);

        return $this->render('reviews', [
            'page' => $page,
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCallback()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new CallbackForm();

        if ($model->load(Yii::$app->request->post()) && $model->send(Yii::$app->params['toEmail'])) {
            return [
                'title' => Yii::t('app', 'Callback'),
                'body' => '<div class="alert alert-success">' . Yii::t('app', 'Thank you for contacting us. We will respond to you as soon as possible.') . '</div>',
            ];
        }

        return [
            'title' => Yii::t('app', 'Callback'),
            'body' => $this->renderAjax('callback', [
                'model' => $model,
            ]),
        ];
    }
}
