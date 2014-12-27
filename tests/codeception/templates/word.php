<?php

return [
    'user_id' => 1,
    'en' => $faker->unique()->word,
    'ja' => 'ja_' . $faker->unique(true)->word,
    'created_at' => $faker->unixTime,
    'updated_at' => $faker->unixTime,
];
