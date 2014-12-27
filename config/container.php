<?php

$container = \Yii::$container;

// yii\behaviors
$container->set('yii\behaviors\BlameableBehavior', [
    'createdByAttribute' => 'user_id',
    'updatedByAttribute' => 'user_id',
]);

// yii\data
$container->set('yii\data\Pagination', [
    'pageSizeParam' => false,
]);

// yii\widgets
$container->set('yii\widgets\LinkPager', [
    'maxButtonCount' => 5,
]);


// yii\widgets
$container->set('odaialali\yii2toastr\ToastrFlash', [
    'options' => [
        'timeOut' => 3600,
    ],
]);

