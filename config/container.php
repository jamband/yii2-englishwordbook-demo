<?php

$_ = \Yii::$container;

// yii\behaviors
$_->set('yii\behaviors\BlameableBehavior', [
    'createdByAttribute' => 'user_id',
    'updatedByAttribute' => 'user_id',
]);

// yii\data
$_->set('yii\data\Pagination', [
    'pageSizeParam' => false,
]);

// yii\widgets
$_->set('yii\widgets\LinkPager', [
    'maxButtonCount' => 5,
    'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
    'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
    'firstPageLabel' => '<i class="fa fa-angle-double-left"></i>',
    'lastPageLabel' => '<i class="fa fa-angle-double-right"></i>',
]);

$_->set('yii\widgets\Pjax', [
    'scrollTo' => 0,
]);

// app\widgets\ToastrNotification
$_->set('app\widgets\ToastrNotification', [
    'options' => [
        'escapeHtml' => true,
        'timeOut' => 3600,
    ],
]);
