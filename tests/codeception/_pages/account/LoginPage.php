<?php

namespace tests\codeception\_pages\account;

use yii\codeception\BasePage;

/**
 * Represents login page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class LoginPage extends BasePage
{
    /**
     * @inheritdoc
     */
    public $route = 'site/login';

    /**
     * @var string username selector for login form
     */
    public static $username = '#loginform-username';

    /**
     * @var string password selector for login form
     */
    public static $password = '#loginform-password';

    /**
     * @var string login button for login form
     */
    public static $loginButton = 'ログイン';

    /**
     * @var string logout link
     */
    public static $logoutLink = 'Logout';

    /**
     * Login.
     * @param string $username
     * @param string $password
     */
    public function login($username = '', $password = '')
    {
        $this->actor->fillField(static::$username, $username);
        $this->actor->fillField(static::$password, $password);
        $this->actor->click(static::$loginButton);
        $this->actor->wait(2);
    }
}
