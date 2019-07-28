<?php

use \Codeception\Step\Argument\PasswordArgument;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

   /**
    * Define custom actions here
    */

    public function login($name, $pass)
    {
        $I = new AcceptanceTester($this->getScenario());
        $I->amOnPage('/user/login');
        $I->see('Iniciar sesión');
        $I->amGoingTo('Login as admin');
        $I->fillField('name', $name);
        $I->fillField('pass', new PasswordArgument($pass));
        $I->click('#edit-submit');
        $I->canSee('admin');
    }
}
