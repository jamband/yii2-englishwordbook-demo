<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\bootstrap\ButtonDropdown;
use yii\helpers\Html;

?>
<div class="pull-right">
    <?= ButtonDropdown::widget([
        'label' => Html::icon('list-ul', 'fa'),
        'encodeLabel' => false,
        'options' => [
            'id' => 'word-action',
            'class' => 'btn btn-default',
            'data-hover' => 'dropdown',
            'data-delay' => '300',
            'data-close-others' => 'false',
        ],
        'dropdown' => [
            'options' => [
                'class' => 'pull-right',
            ],
            'items' => $items,
        ],
    ]) ?>
</div><!-- /.pull-right -->
