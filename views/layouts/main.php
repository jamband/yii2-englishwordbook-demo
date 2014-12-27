<?php

/* @var $this yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\CommonAsset;
use app\widgets\Alert;
use odaialali\yii2toastr\ToastrFlash;

CommonAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::encode(Yii::$app->name),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default',
        ],
    ]);
    /* @var $user yii\web\User */
    $user = Yii::$app->user;
    $username = !$user->isGuest ? $user->identity->username : '';
    echo Nav::widget([
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
    ]);
    NavBar::end();
    ?>

    <?= ToastrFlash::widget() ?>

    <div class="container">
        <?= $content ?>
    </div><!-- /.container -->
</div><!-- /.wrap -->

<footer class="footer">
    <div class="text-center">
        &copy; <?= (new Datetime)->format('Y') ?> Tomoki Morita.
        <?= Yii::powered() ?>
        version: <?= Yii::getVersion() ?>
        mode: <?= YII_ENV ?>
    </div><!-- /.text-center -->
</footer><!-- /.footer -->

<?php $this->endBody() ?>
<?php if (YII_ENV_DEV): ?>
    <script type='text/javascript' id="__bs_script__">//<![CDATA[
        document.write("<script async src='//HOST:3000/browser-sync/browser-sync-client.1.8.2.js'><\/script>".replace(/HOST/g, location.hostname).replace(/PORT/g, location.port));
    //]]></script>
<?php endif; ?>
</body>
</html>
<?php $this->endPage() ?>
