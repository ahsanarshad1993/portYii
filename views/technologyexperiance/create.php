<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Technologyexperiance */

$this->title = 'Create Technologyexperiance';
$this->params['breadcrumbs'][] = ['label' => 'Technologyexperiances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technologyexperiance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'workexperiance' => $workexperiance,
    ]) ?>

</div>
