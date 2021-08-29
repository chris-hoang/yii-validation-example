<?php

namespace app\components\validators;

use yii\validators\Validator;

class SubjectValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $pattern = '/^[a-zA-Z\s]+$/';
        if (!preg_match($pattern, $model->$attribute)) {
            $this->addError($model, $attribute, 'Subject is only alphabet and space');
        }
    }
}