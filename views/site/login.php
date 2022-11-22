<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

$this->title = Yii::t('app', 'Login');
?>
<div class="row">
    <div class="col-12 mt-3 text-center text-uppercase">
        <h2>Login</h2>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
    <main class="row">
        <div class="col-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="mb-3">
                <?= $form->field($model, 'username')
                ->textInput(['placeholder' => $model->getAttributeLabel('username')])
                ->label(false) ?>
            </div> 
            <div class="mb-3">   
            <?= $form->field($model, 'password')
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
                ->label(false) ?>
            </div>    
            <div class="form-group mb-3">
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-outline-dark', 'name' => 'login-button']) ?>
            </div>
            <p class="hint-block mb-3">
                <?= Yii::t('app', 'If you forgot your password you can {reset_it}.', [
                    'reset_it' => Html::a(Yii::t('app', 'reset it'), ['site/request-password-reset']),
                ]) ?>
            </p>
            <?php ActiveForm::end(); ?>
        </div>
    </main>
    <div class="divider">
            <?= Yii::t('app', 'or') ?>
    </div>

    <div class="oauth-box">
        <div class="registration-prompt">
            <?= Yii::t('app', 'Don\'t have an account? {signUpLink}', [
                    'signUpLink' => Html::a(Yii::t('app', 'Sign up!'), ['/site/signup'])
                ]) ?>
    </div>

    <?= \app\widgets\AuthChoice::widget([
                'options' => ['class' => 'auth-clients-wrapper'],
                'baseAuthUrl' => ['site/auth'],
                'popupMode' => false,
    ]) ?>
       
    </div>
</div>