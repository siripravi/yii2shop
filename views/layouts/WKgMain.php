<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\assets\FontAwesomeAsset;
use app\modules\modal\Modal;
use yii\helpers\Url;
use kartik\icons\Icon;

use app\models\Question;
use app\models\Review;
use app\widgets\OrderScheme;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<?= $this->render('_topNav');?>
<header id="header">
    <?php
    NavBar::begin([
       // 'brandLabel' => '<a href="/">'. Html::img("/image/site/nyxta.png",["style"=>"max-height: 80%; padding: 0;position:relative;"]).'</a>',
       // 'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-light bg-light']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-lg-0'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Shop', 'url' => ['/shop']],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);?>
            <div class="col-4 header_search ps-4">
                <!--?= $this->render('_searchForm');  ?-->       		
            </div>
        <div class="col-lg-auto text-center text-lg-left header-item-holder justify-content-end">
            <span class="">
                <?= Html::a('<iconify-icon icon="emojione:flag-for-united-states" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'en']), ['class' => ['btn btn-sm', Yii::$app->language === 'en' ? '' : ''], 'hreflang' => 'us-EN', 'rel' => 'nofollow']) ?>
            </span>
            <span class="border-start border-primary">
                <?= Html::a('<iconify-icon icon="emojione:flag-for-india" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'hi']), ['class' => ['btn btn-sm', Yii::$app->language === 'hi' ? '' : ''], 'hreflang' => 'hi-IN', 'rel' => 'nofollow']) ?>
            </span>
        </div>  
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Menu </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
   <?php NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') : ?>
        <?= OrderScheme::widget() ?>
        <div class="card how my-4">
            <div class="card-body">
                <div class="h1 text-center"><?= Yii::t('app', 'Questions and answers') ?></div>
                <?php
                $question = Question::find()
                    ->where(['status' => Question::STATUS_PUBLISHED])
                    ->orderBy(['id' => SORT_DESC])
                    ->limit(5)
                    ->all();
                echo '<div class="question-list">';
                foreach ($question as $q) {
                    echo '<div class="media">';
                    echo $this->render('../site/_question_item', [
                        'model' => $q,
                    ]);
                    echo '</div>';
                }
                echo '</div>';
                ?>
            </div>
        </div>
        <div class="card how my-4">
            <div class="card-body">
                <div class="h1 text-center"><?= Yii::t('app', 'Reviews about the company') ?></div>
                <?php
                $review = Review::find()
                    ->where(['status' => Review::STATUS_PUBLISHED])
                    ->andWhere(['product_id' => null])
                    ->orderBy(['id' => SORT_DESC])
                    ->limit(5)
                    ->all();
                echo '<div class="review-list">';
                foreach ($review as $r) {
                    echo '<div class="media">';
                    echo $this->render('../site/_review_item', [
                        'model' => $r,
                    ]);
                    echo '</div>';
                }
                echo '</div>';
                ?>
            </div>
        </div>
    <?php endif; ?>
</main>
<?php echo $this->render('_footer'); ?> 
 <!--<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
           
                <div class="col-md-6 text-center text-md-start">&copy; My Company <= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><= Yii::powered() ?></div>
        
        </div>
    </div>
</footer>   -->
           
<?= Modal::widget([
    'titleTag' => 'h3',
    'center' => true,
    'size' => 'modal-lg',
    ]); ?>
<div class="modal fade" id="nav-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-nav-content">
            <div class="modal-nav-body">
            
            </div>
            </div>
        </div>
    </div>      
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
