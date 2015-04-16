<?php

use yii\helpers\ArrayHelper;

$config = [
    'id' => 'englishwordbook',
    'defaultRoute' => 'word/index',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'Uwzhs_7cHYtIBFAI7y4F5SlGX0X4oGLX',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '' => 'word',
                '<action>' => 'site/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'assetManager' => [
            'linkAssets' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => false,
                'yii\bootstrap\BootstrapAsset' => false,
                'yii\bootstrap\BootstrapPluginAsset' => false,
                'yii\widgets\PjaxAsset' => false,
                'yii\widgets\ActiveFormAsset' => false,
                'yii\validators\ValidationAsset' => false,
                'odaialali\yii2toastr\ToastrAsset' => false,
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
    ],
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return ArrayHelper::merge(require __DIR__ . '/common.php', $config);
