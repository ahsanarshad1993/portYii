<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true])->label('Type (e.g. Mobile, Email etc.)') ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true])->label('Value') ?>

    <?= $form->field($model, 'extension')->textInput(['maxlength' => true])->label('Extension (if applicable)') ?>

    <?= $form->field($model, 'personalinfo_id')->hiddenInput(['value' => $pid])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
