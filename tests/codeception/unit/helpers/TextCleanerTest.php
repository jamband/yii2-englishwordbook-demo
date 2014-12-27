<?php

namespace tests\codeception\unit\helpers;

use yii\codeception\TestCase;
use app\helpers\TextCleaner;

class TextCleanerTest extends TestCase
{
    public function testTrim()
    {
        $this->assertSame('', TextCleaner::trim(' '));
        $this->assertSame('', TextCleaner::trim('　'));
        $this->assertSame('a', TextCleaner::trim(' a '));
        $this->assertSame('あ', TextCleaner::trim('　あ　'));
        $this->assertSame('あ い', TextCleaner::trim('　あ　い　'));
    }
}
