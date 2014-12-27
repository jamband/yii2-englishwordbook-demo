<?php

namespace tests\codeception\unit\models;

use Yii;
use yii\codeception\TestCase;
use app\models\LoginForm;
use tests\codeception\unit\fixtures\UserFixture;

class LoginFormTest extends TestCase
{
    public function fixtures()
    {
        return [
            'users' => UserFixture::className(),
        ];
    }

    public function testRules()
    {
        // empty username and password
        $model = new LoginForm([
            'username' => '',
            'password' => '',
        ]);
        $this->assertFalse($model->validate());

        // empty password
        $model = new LoginForm([
            'username' => $this->users['user1']['username'],
            'password' => '',
        ]);
        $this->assertFalse($model->validate());

        // empty username
        $model = new LoginForm([
            'username' => '',
            'password' => str_repeat($this->users['user1']['username'], 2),
        ]);
        $this->assertFalse($model->validate());

        // ok
        $model = new LoginForm([
            'username' => $this->users['user1']['username'],
            'password' => str_repeat($this->users['user1']['username'], 2),
        ]);
        $this->assertTrue($model->validate());
    }

    public function testLogin()
    {
        // failure
        $model = new LoginForm([
            'username' => $this->users['user1']['username'],
            'password' => 'wrong_password',
        ]);
        $this->assertFalse($model->login());
        $this->assertTrue(Yii::$app->user->isGuest);

        $model = new LoginForm([
            'username' => 'wrong_username',
            'password' => str_repeat($this->users['user1']['username'], 2),
        ]);
        $this->assertFalse($model->login());
        $this->assertTrue(Yii::$app->user->isGuest);

        // success
        $model = new LoginForm([
            'username' => $this->users['user1']['username'],
            'password' => str_repeat($this->users['user1']['username'], 2),
        ]);
        $this->assertTrue($model->login());
        $this->assertFalse(Yii::$app->user->isGuest);
    }

    public function testGetUser()
    {
        // failure
        $model = new LoginForm;
        $model->username = 'wrong_username';
        $this->assertNull($model->getUser());

        // success
        $model = new LoginForm;
        $model->username = $this->users['user1']['username'];
        $this->assertInstanceOf('app\models\User', $model->getUser());
    }
}
