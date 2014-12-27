<?php

use tests\codeception\_steps\CommonSteps;
use tests\codeception\_pages\word\CreatePage;

$I = new CommonSteps($scenario);
$I->wantTo('ensure that create works');

CreatePage::openBy($I);
$I->login();

$I->amGoingTo('verify word form element');
    $I->seeElement(CreatePage::$en);
    $I->seeElement(CreatePage::$ja);

$I->amGoingTo('verify word insert form');
    $I->click('登録する');
    $I->wait(1);
    $I->see('英単語が入力されていません。', '.help-block');
    $I->see('日本語訳が入力されていません。', '.help-block');

    $I->fillField(CreatePage::$en, 'hello');
    $I->fillField(CreatePage::$ja, 'こんにちは');
    $I->click('登録する');
    $I->wait(1);
    $I->seeInCurrentUrl('word/index');
    $I->see('英単語の追加が完了いたしました。');

$I->amGoingTo('verify inserted word');
    $I->click(['link' => 'Home']);
    $I->see('hello', CreatePage::$word);
    $I->moveMouseover(CreatePage::$word);
    $I->see('こんにちは');

$I->amGoingTo('verify action link');
    CreatePage::openBy($I);
    $I->moveMouseover(CreatePage::$actionButton);
    $I->click('Home');
    $I->seeInCurrentUrl('word/index');
