<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Personalinfo */

$this->title = 'Create Personalinfo';
$this->params['breadcrumbs'][] = ['label' => 'Personalinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personalinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
