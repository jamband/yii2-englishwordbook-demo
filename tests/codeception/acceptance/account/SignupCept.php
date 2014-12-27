<?php

use tests\codeception\_pages\account\SignupPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that signup works');

$signupPage = SignupPage::openBy($I);

$I->amGoingTo('try to signup with empty credentials');
    $signupPage->signup();
    $I->seeElement('.has-error');

$I->amGoingTo('try to sugnup with correct credentials');
    $signupPage->signup('username', 'email@example.com', 'password', 'password');
    $I->see('Logout (username)');
