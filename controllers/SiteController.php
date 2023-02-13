<?php
namespace app\controllers;
use app\components\AuthHandler;
use app\models\Auth;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\User;
use yii\authclient\ClientInterface;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\authclient\AuthAction;
use yii\captcha\CaptchaAction;
use yii\web\ErrorAction;
use yii2tech\sitemap\File;
use yii\web\Response;



use app\models\CallbackForm;
use app\models\Question;
use app\models\QuestionForm;
use app\models\Review;
use app\models\ReviewForm;
//use common\modules\block\traits\BlockTrait;
use app\modules\page\models\Page;
use app\models\Category;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

use app\models\ContactForm;


class SiteController extends Controller
{
    const REMEMBER_ME_DURATION = 3600 * 24 * 30;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => AuthAction::class,
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
            'captcha' => [
                        'class' => 'lesha724\MathCaptcha\MathCaptchaAction',
                        'imageLibrary' => 'gd'
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
       // $page = Page::viewPage("welcome",true);

        $categories = !Yii::$app->cache->exists('_categories-' . Yii::$app->language) ? Category::getMain() : [];

        return $this->render('index', [
            'page' => null, //$page,
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
        $page = Page::viewPage("contact-us",true);

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

    public function onAuthSuccess($client)
    {
        (new AuthHandler($client))->handle();
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user, self::REMEMBER_ME_DURATION)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionSitemap($refresh = 0)
    {
        // get content from cache:
        // TODO 区分语言做缓存
        $content = Yii::$app->cache->get('sitemap.xml');
        if ($content === false || $refresh == 1) {
            // if no cached value exists - create an new one
            // create sitemap file in memory:
            $sitemap = new File();
            $sitemap->fileName = 'php://memory';

            // write your site URLs:
            $sitemap->writeUrl(['site/index']);
            $sitemap->writeUrl(['site/about']);
            $sitemap->writeUrl(['site/login']);
            $sitemap->writeUrl(['site/signup']);
            $sitemap->writeUrl(['site/auth']);
            $sitemap->writeUrl(['project/list']);
            $sitemap->writeUrl(['project/top-projects']);
            $sitemap->writeUrl(['tags']);

// or to iterate the row one by one

            $projectQuery = (new\yii\db\Query())
                ->from('project')->where(['status'=>20]);

            foreach ($projectQuery->each() as $project) {
                $sitemap->writeUrl(['project/view', 'uuid' => $project['uuid']]);
            }
            $tagQuery = (new\yii\db\Query())
                ->from('tag');

            foreach ($tagQuery->each() as $tag) {
                $sitemap->writeUrl(['project/list', 'tags' => $tag['name']]);
            }
            // get generated content:
            $content = $sitemap->getContent();

            // save generated content to cache
            Yii::$app->cache->set('sitemap.xml', $content);
        }

        // send sitemap content to the user agent:
        $response = Yii::$app->getResponse();
        $response->format = Response::FORMAT_RAW;
        $response->getHeaders()->add('Content-Type', 'application/xml;');
        $response->content = $content;

        return $response;
    }

   

}
