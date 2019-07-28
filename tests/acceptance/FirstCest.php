<?php 

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function loginAsAdmin(AcceptanceTester $I)
    {
        $I->amOnPage('/user/login');
        $I->see('Iniciar sesión');

        $I->amGoingTo('Login as admin');

        $I->fillField('name', 'admin');
        $I->fillField('pass', 'admin');
        //$I->click('Log in');
        $I->click('#edit-submit');

        $I->canSee('admin');
    }

}
