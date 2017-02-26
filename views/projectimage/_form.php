<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Projectimage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projectimage-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?php //echo $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

	 <?= $form->field($model, 'picture')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']]

     ])?>

    <div class="form-group">
        <label class="control-label" for="project_id">Project</label>
        <?= Html::activeDropDownList($model, 'project_id', ArrayHelper::map($project, 'id', 'name'), ['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
