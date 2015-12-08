<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\bootstrap\ButtonDropdown;
use yii\helpers\Html;

?>
<div class="pull-right">
    <?= ButtonDropdown::widget([
        'label' => '<i class="fa fa-list-ul"></i>',
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
                'class' => 'dropdown-menu-right',
            ],
            'items' => $items,
        ],
    ]) ?>
</div>
