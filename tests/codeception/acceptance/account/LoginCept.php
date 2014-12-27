<?php

use tests\codeception\_pages\account\LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that login works');

$loginPage = LoginPage::openBy($I);

$I->amGoingTo('try to login with empty credentials');
    $loginPage->login();
    $I->see('ログイン情報が正しくありません。');

$I->amGoingTo('try to login with correct credentials');
    $user = $I->getFixture('users')->getModel('user1');
    $loginPage->login($user['username'], str_repeat($user['username'], 2));
    $I->see($loginPage::$logoutLink . ' (' . $user['username'] . ')');
