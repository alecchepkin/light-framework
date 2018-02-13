<?php


class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {

    }

    public function frontPageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('WHY CHOOSE US');
    }
}
