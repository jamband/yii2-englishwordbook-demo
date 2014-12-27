<?php

use tests\codeception\_pages\site\AboutPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that about works');

AboutPage::openBy($I);
$I->see('このサイトについて', 'h1');
