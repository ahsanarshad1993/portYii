<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Workexperiance */

$this->title = 'Create Workexperiance';
$this->params['breadcrumbs'][] = ['label' => 'Workexperiances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workexperiance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pid' => $pid,
    ]) ?>

</div>
