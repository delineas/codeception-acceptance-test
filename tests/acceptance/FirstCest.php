<?php 

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/user/login');
        $I->see('Log in');

        $I->submitForm('#user-login-form', array('user' => array(
            'name' => 'admin',
            'password' => 'admin'
        )), 'submitButton');

        $I->fillField('name', 'admin');
        $I->fillField('pass', 'admin');
        $I->click('Log in');

        $I->canSeeCurrentUrlEquals('/user/1');
    }

}
