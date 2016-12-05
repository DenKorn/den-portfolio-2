<?php

namespace backend\controllers;

use yii\base\Controller;
use yii\filters\AccessControl;

class ActivityController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}