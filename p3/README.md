
# Project 3
+ By: Huy Nguyen
+ URL: <http://e2p3.huynguyenau.me>

## Graduate requirement

+ [x] I have integrated testing into my application
+ [ ] I am taking this course for undergraduate credit and have opted out of integrating testing into my application

## Outside resources

+ Game ideas: https://www.playworks.org/game-library/ro-sham-bo-or-rock-paper-scissors/
+ Logo, and images were downloaded from https://thenounproject.com/term/black-and-white/
+ Fonts: Abotek and Sofia Pro (downloaded from https://fonts.adobe.com/)
+ Game icons: https://fontawesome.com/

## Notes for instructor
Thank you very much for an excellent course!

## Codeception testing output
```
Codeception PHP Testing Framework v4.1.22
Powered by PHPUnit 9.5.10 by Sebastian Bergmann and contributors.

Acceptance Tests (5) ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
GamePageCest: Page loads
Signature: GamePageCest:pageLoads
Test: tests/acceptance/GamePageCest.php:pageLoads
Scenario --
 I am on page "/"
 I see "Can you please tell us your name?"
 I see element "[test=instruction]"
 I see element "[test=logo]"
 I see "Game rules"
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
 Computer chosespaper
 I see element "[test=player-wins]"
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
 I assert greater than or equal 5,16
 I grab text from "[test=round-count]"
 I click "2021-12-02 03:18:32"
 I see "2021-12-02 03:18:32"
 PASSED 

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


Time: 00:00.264, Memory: 12.00 MB
OK (5 tests, 14 assertions)
```
