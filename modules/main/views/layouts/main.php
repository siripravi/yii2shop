<?php
use app\assets\FontAwesomeAsset;
use app\assets\SiteAsset;
use common\modules\modal\Modal;

use yii\helpers\Html;
use yii\helpers\Url;

use kartik\icons\Icon;

$asset = SiteAsset::register($this);
//FontAwesomeAsset::register($this);

$this->registerLinkTag(['rel' => 'canonical', 'href' => Url::to((Yii::$app->language === 'en' ? '/en' : null) . explode('?', Yii::$app->request->url)[0], true)]);

$this->registerLinkTag(['rel' => 'alternate', 'hreflang' => 'en-US', 'href' => Url::current(['lang' => 'en'], 'https')]);
$this->registerLinkTag(['rel' => 'alternate', 'hreflang' => 'hi-IN', 'href' => Url::current(['lang' => 'hi'], 'https')]);
// FontAwesome icons
Icon::map($this, Icon::FA);

// Page models
//$pages = Page::findAll(['menu' => true]);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - <?= Yii::$app->name ?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<!-- Fonts -->
<!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
 
    <?php $this->head() ?>
	<style>
	.pagination li a:hover {
    background-color: var(--blue);
     }
	 .pagination li.active a{
		 background-color:var(--blue);
	 }
.pagination li a, .pagination li span {
    margin: 0 5px;
    /* padding: 10px 20px; */
	display:inline-block;
    width: 50px;
    height: 50px;
    line-height: 50px;
    border-radius: 50%;
    font-weight: 600;
    text-align: center;
    color: #ffffff;
    background-color: var(--blue-mad);
    transition: background-color .3s ease;
}
.work-background {
    background-color: #c6715a;
    height: 170px;
    max-height: 100%;
}
.work-container {
    height: 170px;
    max-height: 100%;
}
.work-container h4 {
    font-size: 28px;
    /*font-family: "YanoneKaffeesatz-Regular";*/
    padding-bottom: 10px;
    color: #ffffff;
    font-weight: 400 !important;
    margin: 0;
}
.work-container p {
    color: white;
    margin: 0;
}
.work-container p a {
    color: white;
}
</style>
</head>
<body>
<?php $this->beginBody() ?>
 
  <?php echo $this->render('_headerNav'); ?>
<div class="super_container">    
    <div class="super_container_inner">
        <div class="super_overlay"></div>
        <div>
          
            <!-- preloader -->
            <div class="text-center" id="loader">
                <div class="spinner-grow text-success" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <div class="spinner-grow text-danger" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <div class="spinner-grow text-warning" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
            <div style="padding-top:146px;">
            
                  <?= $content ?>
            </div>
        </div>
        <div class="work-background p-0 container-fluid" id="WorkOffer">
            <div class="work-container d-flex justify-content-center flex-column text-center align-items-center" id="#WorkOffer">
                <h4 _msthash="248846" _msttexthash="986401">Do you want to become a part of our team?</h4>
                <p _msthash="229450" _msttexthash="208884">Call<a href="tel:+7 (999) 923 93 39" _istranslated="1">+7 (999) 923 93 39</a></p>
                <p _msthash="229567" _msttexthash="1081093">Write to the<a href="mailto:gonmasterskaya@yandex.ru" _istranslated="1">gonmasterskaya@yandex.ru</a></p>
            </div>
    </div>   
        <!-- Footer -->
        <?php echo $this->render('_footer'); ?>
    </div>	
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
</div> <!--super container -->

     <?php $this->endBody() ?>	 
</body>
</html>
<?php $this->endPage() ?>