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
echo "Initially, each player has ", $initial_marbles, " marbles.\n\n";
// + For each round, as long as the number of marbles of player A and player B are larger than 0, execute the loop
for ($round =1; $number_marbles_A > 0 and $number_marbles_B > 0; $round++) {
    //If $round is odd, Player A hides marbles, Player B guesses
    if ($round %2 != 0) {   
    $randomMarblesA = rand(1,$number_marbles_A);
    echo "Player A chose ", $randomMarblesA, " marbles.\n";
    array_push($randomA, $randomMarblesA);
    var_dump($randomA);
    shuffle($guess);
    echo "Player B chose ", $guess[0], ".\n";
        if (($randomMarblesA % 2 == 0 and $guess[0] == "even") or ($randomMarblesA % 2 !== 0 and $guess[0] == "odd")) {
        //+ Compare the guess with the number of marbles
            $number_marbles_A -= $randomMarblesA;
            $number_marbles_B += $randomMarblesA;
            echo "Player B is correct. Player B wins. \n";
        } else {
            $number_marbles_A += $randomMarblesA;
            $number_marbles_B -= $randomMarblesA;
            echo "Player B is incorrect. Player A wins. \n";
        }
    } elseif ($round%2 == 0) {
        //If $round is even, Player B hides marbles, Player A guesses
        $randomMarblesB = rand(1,$number_marbles_B);
        echo "Player B chose ", $randomMarblesB, " marbles.\n";
        array_push($randomB, $randomMarblesB);
        var_dump($randomB);
        
        shuffle($guess); //+ Another player randomly choose "even" or "odd"
        echo "Player A chose ", $guess[0], ".\n";
        if (($randomMarblesB% 2 == 0 and $guess[0] == "even") or ($randomMarblesB % 2 !== 0 and $guess[0] == "odd")) {
            $number_marbles_B -= $randomMarblesB;
            $number_marbles_A += $randomMarblesB;  
            echo "Player A is correct. Player A wins. \n";  
        } else {
            $number_marbles_B += $randomMarblesB;
            $number_marbles_A -= $randomMarblesB;   
            echo "Player B is incorrect. Player A wins. \n";   
        }
    }
    $count = $round;
    if ($number_marbles_A > ($initial_marbles * 2)) {
        echo "Current number of marbles: Player A: ", $initial_marbles * 2, ".\n";
        echo "Current number of marbles: Player B: ", 0, ".\n";
    } elseif ($number_marbles_B > ($initial_marbles * 2)) {
        echo "Current number of marbles: Player A: ", 0, ".\n";
        echo "Current number of marbles: Player B: ", $initial_marbles * 2, ".\n";
    } else {
        echo "Current number of marbles: Player A: ", $number_marbles_A, ".\n";
        echo "Current number of marbles: Player B: ", $number_marbles_B, ".\n\n";  
    }
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
    echo "Rounds played: ", $count, ".\n";
    echo "Winner: ", $winner, ".\n\n";
require "index-view.php";
?>