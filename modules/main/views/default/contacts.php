<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap5\ActiveForm */
/* @var $model app\modules\main\models\ContactForm */
/* @var $page dench\page\models\Page */

use himiklab\yii2\recaptcha\ReCaptcha;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->params['breadcrumbs'][] = $page->name;
?>
<div class="card mb-4">
    <div class="card-body">
        <h1 class="mb-4"><?= $page->h1 ?></h1>
        <?= $page->text ?>
    </div>
</div>
