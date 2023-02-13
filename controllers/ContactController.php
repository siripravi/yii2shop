<?php

namespace app\controllers;

use app\models\ContactForm;
use Yii;
use app\modules\page\models\Page;
use app\components\BaseController;

class ContactController extends BaseController
{
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new ContactForm();
        $page = Page::viewPage("contact-us",true);
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('index', [
            'model' => $model, 'page' => $page
        ]);
    }
}