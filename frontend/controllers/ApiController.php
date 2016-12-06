<?php

namespace frontend\controllers;

use common\models\Achievements;
use common\models\Activity;
use common\models\CommonInfo;
use common\models\Contacts;
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
        $this->updateStats();
        Yii::$app->response->format = Response::FORMAT_XML;
        return parent::beforeAction($action);
    }

    public function actionGetContacts()
    {
        $results = Contacts::find()->all();
        $output = ['main_title' => 'CONTACT ME'];
        foreach ($results as $result) {
            $attributes = $result->getAttributes();
            $title_repl = str_replace(' ','_',$attributes['title']);
            $output[$title_repl] = $attributes['description'];

        }
        return $output;
    }

    public function actionGetAbout()
    {
        return $this->getCommonInfoItems('about');
    }

    public function actionGetProjects()
    {
        $results = Projects::find()->orderBy('sort_order')->all();
        $output = ['TITLE' => 'MY PROJECTS'];
        foreach ($results as $result) {
            $attributes = $result->getAttributes();
            $title_repl = str_replace(' ','_',$attributes['title']);
            $output[$title_repl.'0'] = $attributes['title'];
            $output[$title_repl.'1'] = $attributes['description'];
            $output[$title_repl.'2'] = 'Done at: '.$attributes['complete_date'];
            $output[$title_repl.'3'] = $attributes['link'];
            if($attributes['has_image']) {
                $src = Yii::getAlias("@apppublicstorage/projects/").$attributes['id'].".jpg";
                $output[$title_repl.'4'] = '<img src="'.$src.'">';
            }
        }
        return $output;
    }

    public function actionGetAchievements()
    {
        $results = Achievements::find()->all();
        $output = ['main_title' => 'MY ACHIEVEMENTS'];
        foreach ($results as $result) {
            $attributes = $result->getAttributes();
            $title_repl = str_replace(' ','_',$attributes['title']);
            $output[$title_repl.'0'] = $attributes['title'];
            $output[$title_repl.'1'] = $attributes['content'];
    }
        return $output;
    }

    public function actionIndex()
    {
        return $this->getCommonInfoItems('home');
    }

    public function updateStats()
    {
        $model = new Activity();
        $model->save();
    }

}
