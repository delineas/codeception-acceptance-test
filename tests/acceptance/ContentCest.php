<?php

use Faker\Factory;

class ContentCest
{

    protected $title;

    public function _before(AcceptanceTester $I)
    {

        $faker = Factory::create();
        $this->title = $faker->sentence(5);

        $I->login('admin', 'admin');

    }

    public function createAPage(AcceptanceTester $I)
    {
        $I->amOnPage('/node/add/page');

        //$I->seeResponseCodeIs(200);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

        $I->amGoingTo('Fill page content');
        $I->fillField('title[0][value]', $this->title);
        $I->click('#edit-submit');
        $I->canSee($this->title, 'h1');

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
