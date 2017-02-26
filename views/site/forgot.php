<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ForgotForm */
/* @var $form ActiveForm */

$this->title = 'Forgot Password';
?>
<div class="site-forgot">

    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="login-margin">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="panel-body">

                	<p class="text-center">Enter valid Email address associated with you account.</p>

					    <?php $form = ActiveForm::begin(); ?>

					        <?= $form->field($model, 'email') ?>
					    
					        <div class="form-group">
					            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
					        </div>
					    <?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>

</div><!-- site-forgot -->
