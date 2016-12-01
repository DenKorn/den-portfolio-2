<?php

namespace frontend\controllers;

use Yii;
use yii\web\Response;

class ApiController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        Yii::$app->response->format = Response::FORMAT_XML;
        return parent::beforeAction($action);
    }

    public function actionContactForm()
    {
        return $this->render('contact-form');
    }

    public function actionGetAbout()
    {
        return $this->render('get-about');
    }

    public function actionGetLanding()
    {
        return $this->render('get-landing');
    }

    public function actionGetProject()
    {
        return $this->render('get-project');
    }

    public function actionGetProjectsList()
    {
        return $this->render('get-projects-list');
    }

    public function actionGetSkills()
    {
        return 0;
    }

    public function actionIndex()
    {
        return ['lol' => 123, 'piz' => 321];
    }

    public function actionSendRequest()
    {
        return $this->render('send-request');
    }

}
