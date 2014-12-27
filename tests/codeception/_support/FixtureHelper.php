<?php

namespace tests\codeception\_support;

use Codeception\Module;
use yii\test\FixtureTrait;
use tests\codeception\fixtures\UserFixture;
use tests\codeception\fixtures\WordFixture;

/**
 * This helper is used to populate database with needed fixtures before any tests should be run.
 * For example - populate database with demo login user that should be used in acceptance and functional tests.
 * All fixtures will be loaded before suite will be starded and unloaded after it.
 */
class FixtureHelper extends Module
{
    use FixtureTrait;

    /**
     * Method called before any suite tests run. Loads User fixture login user
     * to use in acceptance and functional tests.
     * @param array $settings
     */
    public function _beforeSuite($settings = [])
    {
        $this->loadFixtures();
    }

    /**
     * Method is called after all suite tests run
     */
    public function _afterSuite()
    {
        $this->unloadFixtures();
    }

    /**
     * @inheritdoc
     */
    public function fixtures()
    {
        return [
            'users' => UserFixture::className(),
            'words' => WordFixture::className(),
        ];
    }
}
