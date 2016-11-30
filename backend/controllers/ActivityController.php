<?php

namespace backend\controllers;

use yii\base\Controller;

class ActivityController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}