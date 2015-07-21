<?php

/* @var $this yii\web\View */
/* @var $content string */
/* @var $user yii\web\User */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use odaialali\yii2toastr\ToastrFlash;

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
    <link href="<?= Yii::$app->homeUrl ?>favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <?= Html::cssFile('@web/css/common.css?v=' . filemtime(Yii::getAlias('@webroot/css/common.css'))) ?>
    <?php $this->head() ?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
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
        <?= ToastrFlash::widget() ?>
        <?= $content ?>
    </div>

    <footer class="footer">
        <div class="text-center">
            &copy; <?= (new Datetime)->format('Y') ?> Tomoki Morita.
            <?= Yii::powered() ?>
        </div>
    </footer>

    <?= Html::jsFile('@web/js/common.js?v=' . filemtime(Yii::getAlias('@webroot/js/common.js'))) ?>

<?php $this->endBody() ?>
<?php if (YII_ENV_DEV): ?>
    <?= $this->render('/common/browser-sync') ?>
<?php endif; ?>
</body>
</html>
<?php $this->endPage() ?>
