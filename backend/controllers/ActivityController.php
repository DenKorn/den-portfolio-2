<?php

namespace backend\controllers;

use common\models\Activity;
use yii\base\Controller;
use yii\db\Query;
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
        /* SELECT MONTH(activity.date) as month_num, MONTHNAME(activity.date) as month, count(YEAR(activity.date)) as visits FROM activity GROUP BY month ORDER BY month_num LIMIT 12; */
        $res = (new Query())->select('MONTH(activity.date) as month_num, MONTHNAME(activity.date) as month, count(YEAR(activity.date)) as visits')->from('activity')->groupBy('month')->orderBy('month_num')->limit(12)->all();
        $data = "['Month','visits'],";
        foreach ($res as $item) {
            $data .= "['".$item['month']."',".$item['visits']."],";
        }
        $data =  substr($data, 0, -1);
        return $this->render('index',['diagrammData' => $data]);
    }
}