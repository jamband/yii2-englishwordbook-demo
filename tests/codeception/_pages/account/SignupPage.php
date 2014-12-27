<?php

namespace tests\codeception\_pages\account;

use yii\codeception\BasePage;

/**
 * Represents about page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class SignupPage extends BasePage
{
    /**
     * @inheritdoc
     */
    public $route = 'site/signup';

    /**
     * @var string username selector for signup form
     */
    public static $username = '#signupform-username';

    /**
     * @var string email selector for signup form
     */
    public static $email = '#signupform-email';

    /**
     * @var string password selector for signup form
     */
    public static $password = '#signupform-password';

    /**
     * @var string password_repeat selector for signup form
     */
    public static $password_repeat = '#signupform-password_repeat';

    /**
     * @var string signup button for signup form
     */
    public static $signupButton = '登録';

    /**
     * Signup.
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $password_repeat
     */
    public function signup($username = '', $email = '', $password = '', $password_repeat = '')
    {
        $this->actor->fillField(static::$username, $username);
        $this->actor->fillField(static::$email, $email);
        $this->actor->fillField(static::$password, $password);
        $this->actor->fillField(static::$password_repeat, $password_repeat);
        $this->actor->click(static::$signupButton);
    }
}
