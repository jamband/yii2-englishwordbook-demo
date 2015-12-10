<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login - '.Yii::$app->name;
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->errorSummary($model) ?>

    <div class="row">
        <div class="col-xs-12 col-sm-8">
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>
    </div><!-- /.row -->

    <div class="form-group">
        <?= Html::submitButton('ログイン', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>

<div class="panel panel-default">
    <div class="panel-heading">以下の 2 つのアカウントでログインできます:</div>
    <div class="panel-body">
        <?= Html::encode($model->getAttributeLabel('username')) ?>: admin
        <?= Html::encode($model->getAttributeLabel('password')) ?>: adminadmin |
        <?= Html::encode($model->getAttributeLabel('username')) ?>: demo
        <?= Html::encode($model->getAttributeLabel('password')) ?>: demodemo
    </div>
</div>
