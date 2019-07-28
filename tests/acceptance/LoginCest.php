<?php

use \Codeception\Step\Argument\PasswordArgument;

class LoginCest
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
        $I->fillField('pass', new PasswordArgument('admin'));
        //$I->click('Log in');
        $I->click('#edit-submit');

        $I->canSee('admin');
    }

    public function _after(AcceptanceTester $I)
    {
        $I->amGoingTo('Logout');
        $I->click('//a[@data-drupal-link-system-path="user/logout"]');
    }

}
