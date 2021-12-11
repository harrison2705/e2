
# Project 3
+ By: Huy Nguyen
+ URL: <http://e2p3.huynguyenau.me>

## Graduate requirement

+ [x] I have integrated testing into my application
+ [ ] I am taking this course for undergraduate credit and have opted out of integrating testing into my application

## Outside resources


## Notes for instructor


## Codeception testing output
```
Codeception PHP Testing Framework v4.1.22
Powered by PHPUnit 9.5.10 by Sebastian Bergmann and contributors.

Acceptance Tests (5) ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
GamePageCest: Page loads
Signature: GamePageCest:pageLoads
Test: tests/acceptance/GamePageCest.php:pageLoads
Scenario --
 I am on page "/round?dateSaved=2021-12-11%2007:08:22"
 I see "2021-12-11 07:08:22"
 I see "Player Choice"
 I see "Paper",".player-choice"
 I see "Scissors",".computer-choice"
 I see "Computer",".winner"
 PASSED 

GamePageCest: Test name input
Signature: GamePageCest:testNameInput
Test: tests/acceptance/GamePageCest.php:testNameInput
Scenario --
 I am on page "/"
 I fill field "[test=player-name-input]","Huy"
 I click "[test=player-submit-button]"
 I see "hello"
 PASSED 

GamePageCest: Test validation
Signature: GamePageCest:testValidation
Test: tests/acceptance/GamePageCest.php:testValidation
Scenario --
 I am on page "/"
 I fill field "[test=player-name-input]",""
 I click "[test=player-submit-button]"
 I see element "[test=validation-output]"
 PASSED 

GamePageCest: Play game
Signature: GamePageCest:playGame
Test: tests/acceptance/GamePageCest.php:playGame
Scenario --
 I am on page "/optionResults"
 I fill field "[test=rock-radio]","rock"
 I fill field "[test=paper-radio]","paper"
 I fill field "[test=scissors-radio]","scissors"
 I click "[test=roshambo-button]"
 I see element "[test=results-h2]"
 I grab text from "[test=player-outcome]"
 You chosescissors
 I grab text from "[test=computer-outcome]"
 Computer chosesrock
 I see element "[test=computer-wins]"
 PASSED 

GamePageCest: Round history check
Signature: GamePageCest:roundHistoryCheck
Test: tests/acceptance/GamePageCest.php:roundHistoryCheck
Scenario --
 I am on page "/roundHistory"
 I see element "[test=round-history-h2]"
 I see "Round 1 - "
 I see element "[test=return]"
 I grab multiple "[test=round-count]"
 I assert greater than or equal 5,36
 I grab text from "[test=round-count]"
 I click "2021-12-07 10:19:38"
 I see "2021-12-07 10:19:38"
 PASSED 

------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


Time: 00:00.256, Memory: 12.00 MB

OK (5 tests, 15 assertions)
```
