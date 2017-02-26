<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Personalinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personalinfo-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'picture')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']]

        ])?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        // 'options' => ['accept' => 'file/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['doc','pdf']]

    ])?>

    <?php // $form->field($model, 'resume')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
