<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Achievements */

$this->title = 'Create Achievements';
$this->params['breadcrumbs'][] = ['label' => 'Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
