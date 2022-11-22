<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use yii\helpers\Html;
use common\modules\image\helpers\ImageHelper;
?>   <div class="card h-100 shadow border-0">
							<!-- Html::img($model->getImageFileUrl('banner'),['class'=>'card-img-top']); ?-->
							<?php if ($model->image) { ?>
					<img src="<?= ImageHelper::thumb($model->image->id, 'small') ?>" alt="<?= $model->image->alt ? $model->image->alt : $model->name ?>" title="<?= $model->title ?>" class="card-img rounded-0 img-fluid">
				<?php } else { ?>
					<img class="img-fluid" src="<?= Yii::$app->params['image']['size']['category']['none'] ?>" alt="">
				<?php } ?>                                
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?= $model->category->title;?></div>
                                    <?= Html::a(Html::encode($model->title), $model->url); ?>
                                    <p class="card-text mb-0">
									<?php
            echo \yii\helpers\HtmlPurifier::process($model->short);
            ?></p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="...">
                                            <div class="small">
											<span>
                <i class="fa fa-calendar"></i>
            </span>
            <span>
                <i class="fa fa-eye"></i><?= $model->click; ?>
            </span>
                                                <div class="fw-bold">Pravinya Valluri</div>
                                                <div class="text-muted"><?= Yii::$app->formatter->asDate($model->created_at); ?> · 6 min read</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
	</div>							