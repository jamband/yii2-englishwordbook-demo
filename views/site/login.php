<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $loginForm app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login - ' . Yii::$app->name;
?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($loginForm) ?>

    <div class="row">
        <div class="col-sm-8">
            <?= $form->field($loginForm, 'username') ?>
            <?= $form->field($loginForm, 'password')->passwordInput() ?>
            <?= $form->field($loginForm, 'rememberMe')->checkbox() ?>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="form-group">
        <?= Html::submitButton('ログイン', ['class' => 'btn btn-primary']) ?>
    </div><!-- /.form-group -->
<?php ActiveForm::end(); ?>

<div class="panel panel-default">
    <div class="panel-heading">以下の 2 つのアカウントでログインできます:</div>
    <div class="panel-body">
        <?= Html::encode($loginForm->getAttributeLabel('username')) ?>: admin
        <?= Html::encode($loginForm->getAttributeLabel('password')) ?>: adminadmin |
        <?= Html::encode($loginForm->getAttributeLabel('username')) ?>: demo
        <?= Html::encode($loginForm->getAttributeLabel('password')) ?>: demodemo
    </div><!-- /.panel-body -->
</div><!-- /.panel -->
