<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Technologyexperiance */

$this->title = 'Update Technologyexperiance: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Technologyexperiances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="technologyexperiance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'workexperiance' => $workexperiance,
    ]) ?>

</div>
