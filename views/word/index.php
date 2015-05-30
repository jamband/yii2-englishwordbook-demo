<?php

/* @var $this yii\web\View */
/* @var $pagination yii\data\Pagination */
/* @var $models app\models\Word */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\bootstrap\ButtonDropdown;

$this->title = 'Home - ' . Yii::$app->name;
?>
<?= $this->render('_action', ['items' => [
    ['label' => 'Create', 'url' => ['create']],
]]) ?>

<?php Pjax::begin() ?>
    <?= $this->render('_sort') ?>

    <div class="text-right">
         <span class="label label-info"><?= Html::encode($pagination->totalCount) ?> results</span>
    </div>

    <div class="text-center">
        <?= LinkPager::widget(compact('pagination')) ?>
    </div>

    <div class="words">
        <?php foreach ($models as $model): ?>
            <?= Html::tag('span', Html::encode($model->en), [
                'class' => 'word',
                'data-content' => Html::encode($model->ja),
                'data-toggle' => 'popover',
                'data-trigger' => 'hover',
            ]) ?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['data-pjax' => '0']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], ['data' => [
                'confirm' => 'この項目を削除してもよろしいですか？',
                'method' => 'post',
            ]]) ?>
            <br>
        <?php endforeach; ?>
    </div>
<?php Pjax::end() ?>

<p class="clearfix"></p>

<div class="row">
    <div class="col-sm-5 col-sm-offset-7">
        <?= Html::beginForm([''], 'get') ?>
            <div class="input-group">
                <?= Html::textInput('search', $search, [
                    'class' => 'form-control',
                    'placeholder' => 'Search',
                ]) ?>
                <span class="input-group-btn">
                    <?= Html::submitButton(Html::icon('search', 'fa'), [
                        'id' => 'word-search',
                        'class' => 'btn btn-primary',
                    ]) ?>
                </span>
            </div>
        <?= Html::endForm() ?>
    </div>
</div>

<?php
// twbs popover
$this->registerJS(<<<'JS'
$(document).on('ready pjax:success', function() {
    $('[data-toggle="popover"]').popover();
});
JS
);
