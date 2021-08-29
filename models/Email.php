<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\components\validators\SubjectValidator;

class Email extends Model
{
    public $email;
    public $name;
    public $subject;
    public $content;

    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'content'], 'required'],
            ['name', 'validateName', 'skipOnEmpty' => false, 'skipOnError' => false],
            ['subject', SubjectValidator::class],
            ['email', 'email'],
        ];
    }

    public function validateName($attribute, $param)
    {
        $pattern = '/^[a-zA-Z\s]+$/';
        if (!preg_match($pattern, $this->$attribute)) {
            $this->addError($attribute, 'Name is only alphabet and space');
        }
    }
}
