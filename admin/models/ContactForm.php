<?php

namespace app\admin\models;

use Exception;
use himiklab\yii2\recaptcha\ReCaptchaValidator2;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $text;
    public $reCaptcha;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email and body are required
            [['name', 'email', 'text'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            [['reCaptcha'], ReCaptchaValidator2::class, 'skipOnEmpty' => YII_DEBUG ? true : false,  'uncheckedMessage' => Yii::t('app', 'Please confirm that you are not a bot.')],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Your name'),
            'email' => Yii::t('app', 'Your E-mail'),
            'text' => Yii::t('app', 'Text'),
            'reCaptcha' => Yii::t('app', 'Verification'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            try {
                Yii::$app->mailer->compose()
                    ->setTo($email)
                    ->setFrom([Yii::$app->params['fromEmail'] => Yii::$app->name])
                    ->setReplyTo([$this->email => $this->name])
                    ->setSubject(Yii::t('app', 'Feedback'))
                    ->setTextBody($this->text)
                    ->send();
            } catch (Exception $e) {
                Yii::$app->mailer2->compose()
                    ->setTo($email)
                    ->setFrom([Yii::$app->params['fromEmail'] => Yii::$app->name])
                    ->setReplyTo([$this->email => $this->name])
                    ->setSubject('Ошибка отправки почты. ' . Yii::t('app', 'Feedback'))
                    ->setTextBody('Ошибка отправки почты, сообщите разработчику. ' . $this->text)
                    ->send();
            }
            return true;
        }
        return false;
    }
}
