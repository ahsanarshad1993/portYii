<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Objective */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objective-form">

    <?php $form = ActiveForm::begin(); ?>


	<?= $form->field($model, 'objective')->textArea(['rows' => '6']) ?>

    <div class="form-group">
        <label class="control-label" for="check">Want to show?</label>
        <?= Html::activeDropDownList($model, 'check', ['true'=>'Yes', 'false'=>'No'], ['class' => 'form-control']) ?>
    </div>
    <?= $form->field($model, 'personalinfo_id')->hiddenInput(['value' => $pid])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
