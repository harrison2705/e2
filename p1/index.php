<?php
// + Create an empty varible $winner to determine who is the winner of the game.
$winner = "";
// + Randomly choose the number of marbles in the beginning of the game, from 5 to 10
$number_marbles_A = $number_marbles_B = $initial_marbles= rand(5,10);
// + Create an array containing "even" and "odd".
$guess = ["even", "odd"];
$currentA = [];
$currentB = [];
// + For each round, as long as the number of marbles of player A and player B are larger than 0, execute the loop
for ($round =1; $number_marbles_A > 0 and $number_marbles_B > 0; $round++) {
    //If $round is odd, Player A hides marbles, Player B guesses
    if ($round %2 != 0) {
        $randomMarblesA = rand(1,$number_marbles_A); //+ Randomly choose a number of marbles that Player A currently has
        shuffle($guess); //+ Player B randomly choose "even" or "odd"
        //+ Compare the guess with the number of marbles
        if (($randomMarblesA % 2 == 0 and $guess[0] == "even") or ($randomMarblesA % 2 !== 0 and $guess[0] == "odd")) {
            
            $number_marbles_A -= $randomMarblesA;
            $number_marbles_B += $randomMarblesA;
            
            $playerBWin = "Player B Win";
        } else {
            $number_marbles_A += $randomMarblesA;
            $number_marbles_B -= $randomMarblesA;
            $playerBWin = "Player B Lose";
        }
    } else {
        //If $round is even, Player B hides marbles, Player A guesses
        $randomMarblesB = rand(1,$number_marbles_B);
        shuffle($guess);
        if (($randomMarblesB % 2 == 0 and $guess[0] == "even") or ($randomMarblesB % 2 !== 0 and $guess[0] == "odd")) {
            $playerAWin = "Player A Win";
            $number_marbles_B -= $randomMarblesB;
            $number_marbles_A += $randomMarblesB;    
        } else {
            $playerAWin = "Player A Lose";
            $number_marbles_B += $randomMarblesB;
            $number_marbles_A -= $randomMarblesB;       
        }
    }
    array_push($currentA, $number_marbles_A);
    array_push($currentB, $number_marbles_B);
    $count = $round;
}
// + Compare the number of marbles of player A and player B. In the view, report the results - player A's move, player B's move, and the winner
#...Final results
if ( $number_marbles_A > $number_marbles_B) {
    $winner = "Player A";
} elseif ($number_marbles_A < $number_marbles_B) {
    $winner = "Player B";
} else {
    $winner = "Tide";
}
require "index-view.php";
?>