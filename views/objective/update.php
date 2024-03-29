<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Objective */

$this->title = 'Update Objective: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Objectives', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="objective-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pid' => $pid,
    ]) ?>

</div>
