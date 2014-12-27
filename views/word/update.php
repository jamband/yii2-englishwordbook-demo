<?php

/* @var $this yii\web\View */
/* @var $word app\models\Word */

use yii\helpers\Html;
use yii\bootstrap\ButtonDropdown;

$this->title = "Update $word->en - " . Yii::$app->name;
?>

<?= $this->render('_action', ['items' => [
    ['label' => 'Home', 'url' => ['index']],
    ['label' => 'Create', 'url' => ['create']],
    ['label' => 'Delete', 'url' => ['delete', 'id' => $word->id], 'linkOptions' => [
        'data-confirm' => Yii::$app->params['confirmDelete'],
        'data-method' => 'post',
    ]],
]]); ?>
<p class="clearfix"></p>

<?= $this->render('_form', compact('word')) ?>
