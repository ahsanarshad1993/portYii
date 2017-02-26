<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Workexperiance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workexperiance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd',])->textInput() ?>
    
    <?= $form->field($model, 'end')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd',])->textInput() ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'details')->textArea(['rows' => '6']) ?>

    <?= $form->field($model, 'personalinfo_id')->hiddenInput(['value' => $pid])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
