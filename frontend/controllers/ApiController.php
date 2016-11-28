<?php

namespace frontend\controllers;

class ApiController extends \yii\web\Controller
{
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
        return $this->render('get-skills');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSendRequest()
    {
        return $this->render('send-request');
    }

}
