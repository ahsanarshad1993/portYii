<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Coverletters */

$this->title = 'Create Coverletters';
$this->params['breadcrumbs'][] = ['label' => 'Coverletters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coverletters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pid' => $pid,
    ]) ?>

</div>
