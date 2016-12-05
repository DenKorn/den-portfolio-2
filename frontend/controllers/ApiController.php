<?php

namespace frontend\controllers;

use common\models\Achievements;
use common\models\CommonInfo;
use common\models\Projects;
use Yii;
use yii\web\Response;

class ApiController extends \yii\web\Controller
{

    function getCommonInfoItems($like) {
        $results = CommonInfo::find()->where(['LIKE','info_header', $like.'%',false])->all();
        $output = [];
        foreach ($results as $result) {
            $attributes = $result->getAttributes();
            $output[$attributes['info_header']] = $attributes['info_content'];
        }
        return $output;
    }

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
        return $this->getCommonInfoItems('about');
    }

    public function actionGetProjects()
    {
        $results = Projects::find()->all();
        $output = [];
        foreach ($results as $result) {
            $attributes = $result->getAttributes();
            $output[$attributes['info_header']] = $attributes['info_content'];
        }
        return $output;
    }

    public function actionGetAchievements()
    {
        $results = Achievements::find()->all();
        $output = [];
        foreach ($results as $result) {
            $attributes = $result->getAttributes();
            $output[$attributes['info_header']] = $attributes['info_content'];
        }
        return $output;
    }

    public function actionIndex()
    {
        return $this->getCommonInfoItems('home');
    }

    public function actionUpdateStats()
    {
    }

}
