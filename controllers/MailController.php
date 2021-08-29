<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Email;

class MailController extends Controller
{
    public function beforeAction($action)
    {
        \Yii::$app->response->format =  \yii\web\Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }

    public function actionSendEmail()
    {
        $model = new Email();
        $model->load(\Yii::$app->request->post(), '');

        if ($model->validate()) {
            // all inputs are valid
            return 'Your email is sent';
        } else {
            // validation failed: $errors is an array containing error messages
            return $model->errors;
        }
    }
}
