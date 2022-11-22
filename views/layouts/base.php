<?php
use app\assets\FontAwesomeAsset;
use app\assets\SiteAsset;
use app\modules\modal\Modal;

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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Righteous"/>
    <style>
      body {
        font-family: 'Righteous', serif;
        font-size: 48px;
      }
    </style>
    <?php $this->head() ?>
	<style>
	
</style>
</head>
<body>
<?php $this->beginBody() ?>

<?php echo $this->render('_headerNav'); ?>    
<div class="super_container">
    <div class="row min-vh-100 super_container_inner">
        <div class="super_overlay"></div>
        <div class="row main_content">
            <?= $content; ?>        
        </div>
     <!-- Footer -->
     <?php echo $this->render('_footer'); ?>    
    </div>
</div>
<!-- Messages -->

<!-- Messages -->   
    <?= Modal::widget([
    'titleTag' => 'h3',
    'center' => true,
    'size' => 'modal-lg',
    ]); ?>
    
    <!--= $this->render('_counters') ?-->

</body>
    <<div class="modal fade" id="nav-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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