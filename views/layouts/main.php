<?php

/* @var $this yii\web\View */
/* @var $content string */
/* @var $user yii\web\User */

use app\widgets\ToastrNotification;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

$user = Yii::$app->user;
$username = !$user->isGuest ? $user->identity->username : '';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" href="<?= Yii::$app->homeUrl ?>favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?= Html::cssFile('@web/css/common.css?v='.filemtime(Yii::getAlias('@webroot/css/common.css'))) ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <?= ToastrNotification::widget() ?>

    <?php NavBar::begin([
        'brandLabel' => Html::encode(Yii::$app->name),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default',
        ],
    ]) ?>
        <?= Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/word/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Signup', 'url' => ['/site/signup'], 'visible' => $user->isGuest],
                ['label' => 'Login', 'url' => ['/site/login'], 'visible' => $user->isGuest],
                ['label' => "Logout ($username)", 'url' => ['/site/logout'], 'visible' => !$user->isGuest,
                    'linkOptions' => ['data-method' => 'post'],
                ],
            ],
        ]) ?>
    <?php NavBar::end() ?>

    <div class="container">
        <?= $content ?>
    </div>

    <footer class="footer">
        <div class="text-center">
            &copy; <?= (new \Datetime)->format('Y') ?> Tomoki Morita.
            <?= Yii::powered() ?>
        </div>
    </footer>

    <?= Html::jsFile('@web/js/common.js?v='.filemtime(Yii::getAlias('@webroot/js/common.js'))) ?>

<?php $this->endBody() ?>

<?php if (YII_ENV_DEV): ?>
    <?= $this->render('/common/browser-sync') ?>
<?php endif ?>

</body>
</html>
<?php $this->endPage() ?>
