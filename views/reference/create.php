<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reference */

$this->title = 'Create Reference';
$this->params['breadcrumbs'][] = ['label' => 'References', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reference-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pid' => $pid,
    ]) ?>

</div>
