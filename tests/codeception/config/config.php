<?php
/**
 * Application configuration shared by all test types
 */
return [
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=localhost;dbname=yii2_englishwordbook_demo_test',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];
