<?php
class GamePageCest
{   
    public function pageLoads(AcceptanceTester $I)
    {
        $I->amOnPage('/round?dateSaved=2021-12-11%2007:08:22');
        $I->see('2021-12-11 07:08:22');
        $I->see('Player Choice');
        $I->see('Paper', '.player-choice');
        $I->see('Scissors', '.computer-choice');
        $I->see('Computer', '.winner');
    }
    public function testNameInput(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('[test=player-name-input]', 'Huy');
        $I->click('[test=player-submit-button]');
        $I->see('hello');

    }
    public function testValidation (AcceptanceTester $I) {
         $I->amOnPage('/');

        $I->fillField('[test=player-name-input]', '');
        $I->click('[test=player-submit-button]');
        $I->seeElement('[test=validation-output]');

    }
    public function playGame(AcceptanceTester $I)
    {
        $I->amOnPage('/optionResults');
        $I->fillField('[test=rock-radio]', 'rock');
        $I->fillField('[test=paper-radio]', 'paper');
        $I->fillField('[test=scissors-radio]', 'scissors');
        $I->click('[test=roshambo-button]');
        $I->seeElement('[test=results-h2]');
        $playerOutcome = $I->grabTextFrom('[test=player-outcome]');
        $I->comment('You chose'.$playerOutcome);
        $computerOutcome = $I->grabTextFrom('[test=computer-outcome]');
        $I->comment('Computer choses'.$computerOutcome);
        if ($playerOutcome == $computerOutcome) {
            $I->seeElement('[test=ties]');
        } elseif ($computerOutcome == "rock") {
            $playerOutcome == "scissors" ? $I->seeElement('[test=computer-wins]') : $I->seeElement('[test=player-wins]');
        } elseif ($computerOutcome == "paper") {
            $playerOutcome == "rock" ? $I->seeElement('[test=computer-wins]') : $I->seeElement('[test=player-wins]');
        } elseif ($computerOutcome == "scissors") {
            $playerOutcome== "paper" ? $I->seeElement('[test=computer-wins]') : $I->seeElement('[test=player-wins]');
        }
    }
    public function roundHistoryCheck (AcceptanceTester $I)
    {   
        $I->amOnPage('/roundHistory');
        $I->seeElement('[test=round-history-h2]');
        $I->see('Round 1 - ');
        $I->seeElement('[test=return]');
        $roundCount = count($I->grabMultiple('[test=round-count]'));
        $I->assertGreaterThanOrEqual(5, $roundCount);
        $dateSaved = $I ->grabTextFrom('[test=round-count]');
        $I->click($dateSaved);
        $I->see($dateSaved);
    }
}
