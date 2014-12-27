<?php

namespace tests\codeception\_pages\word;

use yii\codeception\BasePage;

/**
 * Represents word page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class Page extends BasePage
{
    /**
     * @var string en form selector
     */
    public static $en = '#word-en';

    /**
     * @var string ja form selector
     */
    public static $ja = '#word-ja';

    /**
     * @var string word selector
     */
    public static $word = '.word';

    /**
     * @var string word search selector
     */
    public static $search = '#word-search';

    /**
     * @var string word action selector
     */
    public static $actionButton = '#word-action';
}

