<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $word app\models\Word */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-8">
            <?= $form->field($word, 'en')->textInput(['maxlength' => 64]) ?>
            <?= $form->field($word, 'ja')->textInput(['maxlength' => 64]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($word->isNewRecord ? '登録する' : '更新する', [
            'class' => 'btn btn-primary',
        ]) ?>
    </div>
<?php ActiveForm::end(); ?>
