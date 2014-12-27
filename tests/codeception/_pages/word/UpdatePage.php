<?php

namespace tests\codeception\_pages\word;

use tests\codeception\_pages\word\Page;

/**
 * Represents word page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class UpdatePage extends Page
{
    /**
     * @inheritdoc
     */
    public $route = 'word/update';
}

