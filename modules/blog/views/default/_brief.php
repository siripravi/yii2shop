<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use yii\helpers\Html;

?>

<div class="card h-100 shadow border-0">
	<?= Html::img($model->getImageFileUrl('banner'),['class'=>'card-img-top']); ?>                                
    <div class="card-body p-4">
        <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
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
                        <i class="fa fa-calendar"></i><?= Yii::$app->formatter->asDate($model->created_at); ?>
                    </span>
                    <span>
                        <i class="fa fa-eye"></i><?= $model->click; ?>
                    </span>
                    <div class="fw-bold">Pravi</div>
                        <div class="text-muted">March 12, 2022 · 6 min read</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>