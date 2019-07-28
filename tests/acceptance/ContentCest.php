<?php

use \Codeception\Step\Argument\PasswordArgument;

class ContentCest
{

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user/login');
        $I->see('Iniciar sesión');
        $I->amGoingTo('Login as admin');
        $I->fillField('name', 'admin');
        $I->fillField('pass', new PasswordArgument('admin'));
        $I->click('#edit-submit');
        $I->canSee('admin');

    }

    public function createAPage(AcceptanceTester $I)
    {
        $I->amOnPage('/node/add/page');

        //$I->seeResponseCodeIs(200);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

        $I->amGoingTo('Fill page content');
        $I->fillField('title[0][value]', 'Este es mi título');
        $I->click('#edit-submit');
        $I->canSee('Este es mi título', 'h1');

    }

    public function _after(AcceptanceTester $I)
    {
        $I->amGoingTo('Remove content');
        $I->click('Eliminar', '//*[@id="block-bartik-local-tasks"]/nav/ul/li[3]/a');
        $I->click('#edit-submit');
        $I->amGoingTo('Logout');
        $I->click('//a[@href="/user/logout"]');
    }

}
