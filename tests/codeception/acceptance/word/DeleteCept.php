<?php

use tests\codeception\_steps\CommonSteps;
use tests\codeception\_pages\word\DeletePage;

$I = new CommonSteps($scenario);
$I->wantTo('ensure that delete works');

DeletePage::openBy($I, ['id' => 99999]);
$I->login();

$I->amGoingTo('verify 405 error');
    $I->see('不正なリクエストです。');
