<?php

use yii\helpers\ArrayHelper;

Yii::setAlias('@tests', dirname(__DIR__).'/tests');

return ArrayHelper::merge(require __DIR__.'/common.php', [
    'id' => 'englishwordbook-console',
    'bootstrap' => ['gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\faker\FixtureController',
            'templatePath' => '@tests/codeception/templates',
            'fixtureDataPath' => '@tests/codeception/fixtures/data',
        ],
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'templateFile' => '@jamband/schemadump/template.php',
        ],
        'schemadump' => [
            'class' => 'jamband\schemadump\SchemaDumpController',
        ],
    ],
]);
