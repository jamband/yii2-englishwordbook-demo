<?php

namespace tests\codeception\_pages\site;

use yii\codeception\BasePage;

/**
 * Represents about page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class AboutPage extends BasePage
{
    /**
     * @inheritdoc
     */
    public $route = 'site/about';
}
