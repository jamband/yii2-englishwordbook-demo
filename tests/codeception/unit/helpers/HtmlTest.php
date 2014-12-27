<?php

namespace tests\codeception\unit\helpers;

use yii\codeception\TestCase;
use yii\helpers\Html;

class HtmlTest extends TestCase
{
    public function testIcon()
    {
        $this->assertSame('<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', Html::icon('search'));
        $this->assertSame('<span class="fa fa-search" aria-hidden="true"></span>', Html::icon('search', 'fa'));
        $this->assertSame('<span class="fa fa-search fa-lg" aria-hidden="true"></span>', Html::icon('search', 'fa', 'fa-lg'));
    }
}
