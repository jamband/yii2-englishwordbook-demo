<?php

use tests\codeception\_steps\CommonSteps;
use tests\codeception\_pages\word\IndexPage;

$I = new CommonSteps($scenario);
$I->wantTo('ensure that index works');

IndexPage::openBy($I);
$I->login();

$I->amGoingTo('verify word');
    $I->seeElement(IndexPage::$word);

$I->amGoingTo('verify pagination');
    $I->click('.pagination .next a');
    $I->wait(1);
    $I->seeInCurrentUrl('word/index?page=2');
    $I->seeElement(IndexPage::$word);

$I->amGoingTo('verify sort link');
    $I->click(['link' => 'a']);
    $I->seeInCurrentUrl('word/index?sort=a');
    $I->seeElement(IndexPage::$word);

$I->amGoingTo('verify search form');
    $I->fillField(['name' => 'search'], 'ab');
    $I->click(IndexPage::$search);
    $I->seeInField(['name' => 'search'], 'ab');
    $I->seeInCurrentUrl('word/index?search=ab');

$I->amGoingTo('verify update link');
    IndexPage::openBy($I);
    $I->click(['link' => 'Update']);
    $I->seeInCurrentUrl('word/update');
    $I->seeElement(IndexPage::$en);
    $I->seeElement(IndexPage::$ja);

$I->amGoingTo('verify delete link');
    IndexPage::openBy($I);
    $I->click(['link' => 'Delete']);
    $I->seeInPopup('この項目を削除してもよろしいですか？');
    $I->cancelPopup();

    $I->click(['link' => 'Delete']);
    $I->seeInPopup('この項目を削除してもよろしいですか？');
    $I->acceptPopup();
    $I->seeInCurrentUrl('word/index');
    $I->see('英単語の削除が完了いたしました。');

$I->amGoingTo('verify action link');
    IndexPage::openBy($I);
    $I->moveMouseover(IndexPage::$actionButton);
    $I->click('Create');
    $I->seeInCurrentUrl('word/create');
