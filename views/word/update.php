<?php

/* @var $this yii\web\View */
/* @var $model app\models\Word */

use yii\helpers\Html;
use yii\bootstrap\ButtonDropdown;

$this->title = "Update $model->en - " . Yii::$app->name;
?>

<?= $this->render('_action', ['items' => [
    ['label' => 'Home', 'url' => ['index']],
    ['label' => 'Create', 'url' => ['create']],
    ['label' => 'Delete', 'url' => ['delete', 'id' => $model->id], 'linkOptions' => [
        'data-confirm' => 'この項目を削除してもよろしいですか？',
        'data-method' => 'post',
    ]],
]]); ?>
<p class="clearfix"></p>

<?= $this->render('_form', [
    'model' => $model,
]);
