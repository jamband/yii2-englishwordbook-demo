<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Singup - '.Yii::$app->name;
?>
<h1>新規ユーザ登録</h1>

<?php $form = ActiveForm::begin([
    'enableClientScript' => false,
    'fieldConfig' => ['enableError' => false],
]) ?>
    <?= $form->errorSummary($model) ?>

    <div class="row">
        <div class="col-sm-8">
            <?= $form->field($model, 'username')
                ->hint('半角英数字とアンダースコア(_)のみで 4 から 20 文字まで')
            ?>
            <?= $form->field($model, 'email')
                ->hint('現在お使いのメールアドレス')
            ?>
            <?= $form->field($model, 'password')
                ->passwordInput()
                ->hint('半角英数字とアンダースコア(_)のみで 8 から 60 文字まで')
            ?>
            <?= $form->field($model, 'password_repeat')
                ->passwordInput()
                ->hint('パスワード確認のため、再度入力してください。')
            ?>
            <div class="form-group">
                <?= Html::submitButton('登録', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div><!-- /.row -->
<?php ActiveForm::end() ?>

<div class="panel panel-default">
    <div class="panel-heading">ユーザ登録をするにあたって:</div>
    <div class="panel-body">
        admin, demo というユーザが予め用意されログイン時に利用できますが、新しくユーザ登録することも可能です。
        動作を確認したい方は、適当なユーザ名、メールアドレス、パスワードを入力してお使い下さい。
        アクティベーションなどは実装していませんので、メール送信などはされず、直でユーザ登録される挙動になっています。
    </div>
</div>
