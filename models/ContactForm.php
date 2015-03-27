<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'subject' => 'Тема письма',
            'email' => 'Электронная почта',
            'body' => 'Информация о заказе',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {

            try {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom(['ekvilib5@yandex.ru' => 'ekvilib5@yandex.ru'])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();
            }
            catch(\Exception $ex)
            {
                var_dump($ex->getMessage());
                exit;
            }

            return true;
        } else {
            return false;
        }
    }
}
