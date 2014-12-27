<?php

$timestramp = (new DateTime)->getTimestamp();

return [
    'word1' => [
        'user_id' => 1,
        'en' => 'beer',
        'ja' => 'ビール',
        'created_at' => $timestramp,
        'updated_at' => $timestramp,
    ],
    'word2' => [
        'user_id' => 1,
        'en' => 'cat',
        'ja' => 'ねこ',
        'created_at' => $timestramp,
        'updated_at' => $timestramp,
    ],
    'word3' => [
        'user_id' => 1,
        'en' => 'apple',
        'ja' => 'りんご',
        'created_at' => $timestramp,
        'updated_at' => $timestramp,
    ],
    'word4' => [
        'user_id' => 1,
        'en' => 'eat',
        'ja' => 'たべる',
        'created_at' => $timestramp,
        'updated_at' => $timestramp,
    ],
    'word5' => [
        'user_id' => 1,
        'en' => 'desk',
        'ja' => 'つくえ',
        'created_at' => $timestramp,
        'updated_at' => $timestramp,
    ],
    'word6' => [
        'user_id' => 2,
        'en' => 'ant',
        'ja' => 'あり',
        'created_at' => $timestramp,
        'updated_at' => $timestramp,
    ],
    'word7' => [
        'user_id' => 2,
        'en' => 'deep',
        'ja' => 'ふかい',
        'created_at' => $timestramp,
        'updated_at' => $timestramp,
    ],
];
