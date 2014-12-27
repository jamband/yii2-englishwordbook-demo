<?php

/* @var $this yii\web\View */
/* @var $word app\models\Word */

use yii\helpers\Html;

$this->title = 'Create Word - ' . Yii::$app->name;
?>

<?= $this->render('_action', ['items' => [
    ['label' => 'Home', 'url' => ['index']],
]]) ?>
<p class="clearfix"></p>

<?= $this->render('_form', compact('word')) ?>