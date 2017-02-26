<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="site-login">


        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="login-margin">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{error}",
                                'labelOptions' => ['class' => 'control-label'],
                            ],
                        ]); ?>

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <?= $form->field($model, 'rememberMe')->checkbox([
                                'template' => "{input} {label}\n{error}",
                            ]) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>
                        <div class="text-center ">
                            <a href="?r=site/forgot">Forgot Password?</a>
                        </div>
                    </div>


                </div>
            </div>
         
        </div>


</div>
