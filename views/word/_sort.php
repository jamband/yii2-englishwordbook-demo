<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$sorts = range('a', 'z');
array_push($sorts, 'az', 'za', 'new', 'old', 'rnd');
?>

<div class="pull-left">
    <?php foreach ($sorts as $sort): ?>
        <?= Html::a(Html::encode($sort), ['index', 'sort' => $sort]) ?>
    <?php endforeach; ?>
</div>

<p class="clearfix"></p>
