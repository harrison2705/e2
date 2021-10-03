<?php
// + Create an empty varible $winner to determine who is the winner of the game.
$winner = "";
// + Randomly choose the number of marbles in the beginning of the game, from 5 to 10
$number_marbles_A = $number_marbles_B = $initial_marbles= rand(5,10);
// + Create an array containing "even" and "odd".
$guess = ["even", "odd"];
$guessValue = [];
$currentA = [];
$currentB = [];
$randomA = [];
$randomB = [];
$randomMarblesA = 0;
$randomMarblesB = 0;
$i = 1;
$j = 2;

// + For each round, as long as the number of marbles of player A and player B are larger than 0, execute the loop
for ($round =1; $number_marbles_A > 0 and $number_marbles_B > 0; $round++) {
    //If $round is odd, Player A hides marbles, Player B guesses
    if ($round %2 != 0) {   
        $randomMarblesA = rand(1,$number_marbles_A);
        array_push($randomA, $randomMarblesA);
        shuffle($guess);
        array_push($guessValue,$guess[0]);
            if (($randomMarblesA % 2 == 0 and $guessValue[$round-1] == "even") or ($randomMarblesA % 2 !== 0 and $guessValue[$round-1] == "odd")) {
            //+ Compare the guess with the number of marbles
                $number_marbles_A -= $randomMarblesA;
                $number_marbles_B += $randomMarblesA;
            } else {
                $number_marbles_A += $randomMarblesA;
                $number_marbles_B -= $randomMarblesA;
            }
            array_push($currentA, $number_marbles_A);
            array_push($currentB, $number_marbles_B);
    } elseif ($round % 2 == 0) {//If $round is even, Player B hides marbles, Player A guesses
        $randomMarblesB = rand(1,$number_marbles_B);
        array_push($randomB, $randomMarblesB);
        shuffle($guess); //+ Another player randomly choose "even" or "odd"
        array_push($guessValue,$guess[0]);
        if (($randomMarblesB% 2 == 0 and $guessValue[$round-2] == "even") or ($randomMarblesB % 2 !== 0 and $guessValue[$round-2] == "odd")) {
            $number_marbles_B -= $randomMarblesB;
            $number_marbles_A += $randomMarblesB;  
        } else {
            $number_marbles_B += $randomMarblesB;
            $number_marbles_A -= $randomMarblesB;   
        }
        array_push($currentA, $number_marbles_A);
        array_push($currentB, $number_marbles_B);
    }
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