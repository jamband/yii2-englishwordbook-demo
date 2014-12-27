<?php

namespace tests\codeception\unit\models;

use yii\codeception\DbTestCase;
use tests\codeception\unit\fixtures\UserFixture;
use app\models\SignupForm;

class SignupFormTest extends DbTestCase
{
    public function fixtures()
    {
        return [
            'users' => UserFixture::className(),
        ];
    }

    public function testUsernameRule()
    {
        $signupForm = new SignupForm;

        // skipOnEmpty: false
        $signupForm->username = '';
        $this->assertFalse($signupForm->validate(['username']));

        $signupForm->username = 'username';
        $this->assertTrue($signupForm->validate(['username']));

        // string: min
        $signupForm->username = str_repeat('a', 3);
        $this->assertFalse($signupForm->validate(['username']));

        $signupForm->username = str_repeat('a', 4);
        $this->assertTrue($signupForm->validate(['username']));

        // string: max
        $signupForm->username = str_repeat('a', 21);
        $this->assertFalse($signupForm->validate(['username']));

        $signupForm->username = str_repeat('a', 20);
        $this->assertTrue($signupForm->validate(['username']));

        // match
        $signupForm->username = 'user1-name';
        $this->assertFalse($signupForm->validate(['username']));

        $signupForm->username = 'User1_Name';
        $this->assertTrue($signupForm->validate(['username']));

        // unique
        $signupForm->username = $this->users['user1']['username'];
        $this->assertFalse($signupForm->validate(['username']));

        $signupForm->username = 'username';
        $this->assertTrue($signupForm->validate(['username']));
    }

    public function testEmailRule()
    {
        $signupForm = new SignupForm;

        // skipOnEmpty: false
        $signupForm->email = '';
        $this->assertFalse($signupForm->validate(['email']));

        $signupForm->email = 'email@example.com';
        $this->assertTrue($signupForm->validate(['email']));

        // email
        $signupForm->email = 'email';
        $this->assertFalse($signupForm->validate(['email']));

        $signupForm->email = 'email@example.com';
        $this->assertTrue($signupForm->validate(['email']));

        // unique
        $signupForm->email = $this->users['user1']['email'];
        $this->assertFalse($signupForm->validate(['email']));

        $signupForm->email = 'email@example.com';
        $this->assertTrue($signupForm->validate(['email']));
    }

    public function testPasswordRule()
    {
        $signupForm = new SignupForm;

        // skipOnEmpty: false
        $signupForm->password = '';
        $this->assertFalse($signupForm->validate(['password']));

        $signupForm->password = 'password';
        $this->assertTrue($signupForm->validate(['password']));

        // string: min
        $signupForm->password = str_repeat('a', 7);
        $this->assertFalse($signupForm->validate(['password']));

        $signupForm->password = str_repeat('a', 8);
        $this->assertTrue($signupForm->validate(['password']));

        // string: mix
        $signupForm->password = str_repeat('a', 61);
        $this->assertFalse($signupForm->validate(['password']));

        $signupForm->password = str_repeat('a', 60);
        $this->assertTrue($signupForm->validate(['password']));

        // match
        $signupForm->password = 'pass1-word';
        $this->assertFalse($signupForm->validate(['password']));

        $signupForm->password = 'Pass1_Word';
        $this->assertTrue($signupForm->validate(['password']));
    }

    public function testPasswordRepeat()
    {
        // required
        $signupForm = new SignupForm;
        $signupForm->password_repeat = 'password_repeat';
        $this->assertFalse($signupForm->validate(['password_repeat']));

        // compare
        $signupForm = new SignupForm;
        $signupForm->password = 'password1';
        $signupForm->password_repeat = 'password2';
        $this->assertFalse($signupForm->validate(['password_repeat']));

        $signupForm = new SignupForm;
        $signupForm->password = 'password';
        $signupForm->password_repeat = 'password';
        $this->assertTrue($signupForm->validate(['password_repeat']));
    }

    public function testSignup()
    {
        // failure
        $signupForm = new SignupForm([
            'username' => 'user-name',
            'email' => 'e-mail',
            'password' => 'pass-word',
            'password_repeat' => 'pass-word',
        ]);
        $this->assertNull($signupForm->signup());

        // success
        $signupForm = new SignupForm([
            'username' => 'user_name',
            'email' => 'e-mail@example.com',
            'password' => 'pass_word',
            'password_repeat' => 'pass_word',
        ]);
        $this->assertInstanceOf('app\models\User', $signupForm->signup());
    }
}
