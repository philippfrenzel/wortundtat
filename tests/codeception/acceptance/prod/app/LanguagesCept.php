<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$I = new AcceptanceTester($scenario);

$I->wantTo('ensure that language urls and redirects work');

$I->amOnPage('/');
$I->seeCurrentUrlEquals('/en/user/login');

$I->amOnPage('/de');
$I->seeCurrentUrlEquals('/de/user/login');
$I->see('Anmelden');
$I->makeScreenshot('language-de');

$I->amOnPage('/en-us');
$I->see('Not Found');
