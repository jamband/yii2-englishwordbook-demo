<?php

require __DIR__.'/container.php';

return [
    'name' => 'English Wordbook',
    'language' => 'ja-JP',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'i18n' => [
            'translations' => [
                'yii' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                    'basePath' => '@app/messages'
                ],
            ],
        ],
        'cache' => [
            'class' => yii\caching\FileCache::class,
            // 'class' => yii\caching\MemCache::class,
            // 'servers' => [
                // [
                    // 'host' => 'localhost',
                    // 'port' => 11211,
                    // 'weight' => 100,
                // ],
                // [
                    // 'host' => 'server2',
                    // 'port' => 11211,
                    // 'weight' => 50,
                // ],
            // ],
        ],
        'log' => [
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require __DIR__.'/db.php',
    ],
    'params' => require __DIR__.'/params.php',
];
