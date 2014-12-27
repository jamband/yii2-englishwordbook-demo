<?php

namespace tests\codeception\_steps;

use tests\codeception\_pages\account\LoginPage;
use tests\codeception\_pages\account\SignupPage;

class AccoutSteps extends \AcceptanceTester
{
    /**
     * Login step.
     * @param string $username
     * @param string $password
     */
    public function login($username = '', $password = '')
    {
        $I = $this;
        $I->fillField(LoginPage::$username, $username);
        $I->fillField(LoginPage::$password, $password);
        $I->click(LoginPage::$loginButton);
    }

    /**
     * Signup step.
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $password_repeat
     */
    public function signup($username = '', $email = '', $password = '', $password_repeat = '')
    {
        $I = $this;
        $I->fillField(SignupPage::$username, $username);
        $I->fillField(SignupPage::$email, $email);
        $I->fillField(SignupPage::$password, $password);
        $I->fillField(SignupPage::$password_repeat, $password_repeat);
        $I->click(SignupPage::$signupButton);
    }
}
