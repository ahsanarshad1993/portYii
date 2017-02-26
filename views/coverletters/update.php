<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coverletters */

$this->title = 'Update Coverletters: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Coverletters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coverletters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pid' => $pid,
    ]) ?>

</div>
