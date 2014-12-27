<?php

use tests\codeception\_steps\CommonSteps;
use tests\codeception\_pages\word\UpdatePage;

$I = new CommonSteps($scenario);
$I->wantTo('ensure that update works');

UpdatePage::openBy($I, ['id' => 20]);
$I->login();

$I->amGoingTo('verify update word form');
    $I->seeElement(UpdatePage::$en);
    $I->seeElement(UpdatePage::$ja);

    $I->fillField(UpdatePage::$en, '');
    $I->fillField(UpdatePage::$ja, '');
    $I->click('更新する');
    $I->wait(1);
    $I->see('英単語が入力されていません。', '.help-block');
    $I->see('日本語訳が入力されていません。', '.help-block');

    $I->fillField(UpdatePage::$en, 'hello');
    $I->fillField(UpdatePage::$ja, 'こんにちは');
    $I->click('更新する');
    $I->wait(1);
    $I->seeInCurrentUrl('word/index');
    $I->see('英単語の更新が完了いたしました。');

$I->amGoingTo('verify updated word');
    $I->click(['link' => 'h']);
    $I->wait(1);
    $I->see('hello', UpdatePage::$word);

$I->amGoingTo('verify action link');
    UpdatePage::openBy($I, ['id' => 20]);
    $I->moveMouseover(UpdatePage::$actionButton);
    $I->click('Home');
    $I->seeInCurrentUrl('word/index');

    UpdatePage::openBy($I, ['id' => 20]);
    $I->moveMouseover(UpdatePage::$actionButton);
    $I->click('Create');
    $I->seeInCurrentUrl('word/create');

    UpdatePage::openBy($I, ['id' => 20]);
    $I->moveMouseover(UpdatePage::$actionButton);
    $I->click('Delete');
    $I->seeInPopup('この項目を削除してもよろしいですか？');
    $I->acceptPopup();
    $I->seeInCurrentUrl('word/index');
    $I->see('英単語の削除が完了いたしました。');

$I->amGoingTo('verify 404 error');
    UpdatePage::openBy($I, ['id' => 99999]);
    $I->see('ページが見つかりません。');
