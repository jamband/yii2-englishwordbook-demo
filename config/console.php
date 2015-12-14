<?php

use yii\helpers\ArrayHelper;

Yii::setAlias('@tests', dirname(__DIR__).'/tests');

return ArrayHelper::merge(require __DIR__.'/common.php', [
    'id' => 'englishwordbook-console',
    'bootstrap' => ['gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => \yii\gii\Module::class,
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => \yii\faker\FixtureController::class,
            'templatePath' => '@tests/codeception/templates',
            'fixtureDataPath' => '@tests/codeception/fixtures/data',
        ],
        'migrate' => [
            'class' => \yii\console\controllers\MigrateController::class,
            'templateFile' => '@jamband/schemadump/template.php',
        ],
        'schemadump' => [
            'class' => \jamband\schemadump\SchemaDumpController::class,
        ],
    ],
]);
