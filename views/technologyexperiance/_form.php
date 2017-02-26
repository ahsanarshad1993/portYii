<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Technologyexperiance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technologyexperiance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <label class="control-label" for="workexperiance_id">Where you worked on this technology?</label>
        <?= Html::activeDropDownList($model, 'workexperiance_id', ArrayHelper::map($workexperiance, 'id', 'company'), ['class' => 'form-control']) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
