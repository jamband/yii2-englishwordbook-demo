<?php

namespace tests\codeception\_steps;

use tests\codeception\_pages\account\LoginPage;

class CommonSteps extends \AcceptanceTester
{
    /**
     * Login step.
     */
    public function login()
    {
        $I = $this;
        $user = $I->getFixture('users')->getModel('user1');

        $I->amGoingTo('login');
        $I->seeInCurrentUrl('login');
        $I->fillField(LoginPage::$username, $user['username']);
        $I->fillField(LoginPage::$password, str_repeat($user['username'], 2));
        $I->click(LoginPage::$loginButton);
        $I->wait(2);
        $I->see(LoginPage::$logoutLink . " ({$user['username']})");
    }
}
