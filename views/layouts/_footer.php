<?php
use yii\bootstrap5\Nav;
use yii\helpers\Url;
use yii\widgets\Menu;
use app\widgets\OrderScheme;
?>
<div class="container-fluid pt-5">
    <?= OrderScheme::widget() ?>
</div>
<footer class="bg-gradient-dark">
    <div class="container-fluid bg-dark border-top border-warning rounded-top">
        <div class="row px-xl-5 pt-5 ">
            <div class="col-lg-4 col-md-12 text-white mb-5">
                <div class="mb-3">    
                    <h1><span class=" border rounded-2 border-warning px-3 me-2">N</span>yxta</h1>
                </div>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-warning me-3"></i>696 Street, Tehran, IRAN</p>
                <p class="mb-2"><i class="fa fa-envelope text-warning me-3"></i>koutis353@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-warning me-3"></i>+989351588287</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row justify-content-evenly">
                    <div class="col-md-4 mb-5">
                        <h5 class="fw-bold text-white mb-4">Quick Links</h5>
                        <div class="">                        
                            <?php
                            $items = [
                                ['label' => Yii::t('app', 'Home'), 'url' => ['/']],
                                ['label' => Yii::t('app', 'Catalog'), 'url' => ['/category/index']],
                                ['label' => Yii::t('app', 'Find product'), 'url' => ['/podbor/index']],
                                ['label' => Yii::t('app', 'How to order'), 'url' => ['/site/how']],
                                ['label' => 'FAQ', 'url' => ['/site/questions'],'options'=>['class'=>'']],
                                ['label' => Yii::t('app', 'Information'), 'url' => ['/info/index'],'linkOptions'=>['class'=>'text-white mb-2 text-decoration-none']],
                                ['label' => Yii::t('app', 'Contacts'), 'url' => ['/site/contacts'],'linkOptions'=>['class'=>'text-white mb-2 text-decoration-none']],
                                ['label' => Yii::t('app', 'Reviews'), 'url' => ['/site/reviews'],'linkOptions'=>['class'=>'text-white mb-2 text-decoration-none']],
                            ];
                            echo Menu::widget([
                                'items' => $items,
                                'encodeLabels' => false,
                                'linkTemplate' => '<a class="text-white mb-2 text-decoration-none me-2" href="{url}"><iconify-icon icon="mdi:arrow-right-thick" style="color:#ffc720"></iconify-icon>{label}</a>',
                                'options' => ['class' => 'd-flex flex-column'],
                            ]);
                            ?>                        
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="fw-bold text-white mb-4">Newsletter</h5>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-3 mb-2" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-3 mb-3" placeholder="Your Email" required>
                            </div>
                            <div>
                                <a href="#" type="button" id="btn" style="--clr:#ffc107"><span>Subscribe Now</span><i></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        
        <div class="text-white pb-4 text-center text-md-left">
            <div class="my-3"><!--= Yii::t('app', 'Office and warehouse work') ?-->: <!--= Yii::$app->params['work_time_' . Yii::$app->language] ?--></div>
            <div class="my-3"><!--= Yii::$app->params['address_' . Yii::$app->language] ?--></div>
            <div class="my-3"><?= Yii::$app->params['adminEmail'] ?></div>
        </div>
    </div>
    <div class="text-center py-2 bg-gradient-secondary text-white">
        2017 - <?= date('Y') ?> © <a href="<?= Url::to(['/']) ?>"><?= Yii::$app->name ?></a>
    </div>
  </div>  
  <button type="button"class="btn btn-warning btn-floating btn-lg"id="btn-back-to-top">
  <iconify-icon icon="mdi:arrow-up-bold-box" style="color: red;" width="24" rotate="0deg"></iconify-icon>
 </button>
</footer>