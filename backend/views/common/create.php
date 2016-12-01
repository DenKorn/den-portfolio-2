<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CommonInfo */

$this->title = 'Create Common Info';
$this->params['breadcrumbs'][] = ['label' => 'Common Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="common-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>