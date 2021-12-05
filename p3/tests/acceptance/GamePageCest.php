<?php

class GamePageCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/round?dateSaved=2021-12-03%2002:42:43');

        # Assert the existence of certain text on the page
        $I->see('2021-12-03 02:42:43');
        # Assert the existence of text within a specific element on the page
        $I->see('Player Choice');
        $I->see('Rock', '.player-choice');
        $I->see('Paper', '.computer-choice');
        $I->see('Computer', '.winner');
    }
    public function reviewAGameTest(AcceptanceTester $I)
    {
    $I->amOnPage('/');

    $I->fillField('[test=player-name-input]', 'Huy');

    $I->click('[test=player-submit-button]');

    $I->seeElement('[test=player-name-confirmation]');
    }
}
