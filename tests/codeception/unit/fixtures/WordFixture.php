<?php

namespace tests\codeception\unit\fixtures;

use yii\test\ActiveFixture;

class WordFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Word';

    public $depends = [
        'tests\codeception\unit\fixtures\UserFixture',
    ];
}
