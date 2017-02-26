<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Projectimage */

$this->title = 'Create Projectimage';
$this->params['breadcrumbs'][] = ['label' => 'Projectimages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectimage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'project' => $project,
    ]) ?>

</div>
