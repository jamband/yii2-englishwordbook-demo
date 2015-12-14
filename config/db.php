<?php

return [
    'class' => \yii\db\Connection::class,
    'dsn' => 'mysql:host=localhost;dbname=yii2_englishwordbook_demo',
    'username' => 'root',
    'password' => getenv('DB_PASS'),
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 86400, // 24 hours
];
