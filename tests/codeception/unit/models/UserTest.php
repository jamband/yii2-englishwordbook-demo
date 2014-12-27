<?php


namespace tests\codeception\unit\models;

use yii\codeception\TestCase;

class UserTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->loadFixtures(['user']);
    }

    // TODO add test methods here
}
