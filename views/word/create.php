<?php

/* @var $this yii\web\View */
/* @var $model app\models\Word */

$this->title = 'Create Word';
?>

<?= $this->render('_action', ['items' => [
    ['label' => 'Home', 'url' => ['index']],
]]) ?>
<p class="clearfix"></p>

<?= $this->render('_form', [
    'model' => $model,
]);
