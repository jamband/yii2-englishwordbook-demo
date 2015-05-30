<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

if ($exception->statusCode === 404) {
    $message = 'ページが見つかりません。';
}
if ($exception->statusCode === 405) {
    $message = '不正なリクエストです。';
}

$this->title = "$name . - " . Yii::$app->name;
?>
<h1><?= Html::encode($name) ?></h1>

<div class="alert alert-danger">
    <?= nl2br(Html::encode($message)) ?>
</div>
