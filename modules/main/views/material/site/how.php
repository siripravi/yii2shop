<?php

/* @var $this yii\web\View */

use app\modules\main\widgets\OrderScheme;

/* @var $page \dench\page\models\Page */

$this->params['breadcrumbs'][] = $page->name;
?>

<div class="card mb-4">
    <div class="card-body">
        <h1 class="mb-4"><?= $page->h1 ?></h1>
        <?= $page->text ?>
    </div>
</div>

<?= OrderScheme::widget(['baseUrl' => $this->theme ? $this->assetManager->getBundle(app\site\assets\SiteAsset::class)->baseUrl : null]) ?>