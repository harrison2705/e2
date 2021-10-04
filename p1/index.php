<?php
$winner = ""; //Create an empty variable to determine who is the winner of the game.
$guess = ["even", "odd"]; // Create an array containing two values "Odd" and "Even".
$guessValue = []; // Create arrays containing the guess of Player A and Player B in each round.
$currentA = []; $currentB = []; //Create arrays containing the current total number of marbles of each player in each round.
$randomA = []; $randomB = []; // Create arrays containing the number of marbles that each player decides to hide in each round.
$randomMarblesA = 0;$randomMarblesB = 0; // Create two variables containing the number of marble in Player A and Player B in each round
$number_marbles_A = $number_marbles_B = $initial_marbles= rand(5,10); // Randomly choose the number of marbles at the beginning of the game, from 5 to 10.


// For each round, as long as the number of marbles of each player is larger than 0, execute the loop.
for ($round = 1; $number_marbles_A > 0 and $number_marbles_B > 0; $round++) {
    // In odd rounds, Player A hides marbles, Player B guesses.
    // The player who hides marbles will randomly choose the number of marbles they want to hide, as long as it is larger than 1.
    // The player who guesses will choose "Odd" or "Even".
    // If the guesser is correct, they will receive the number of marbles the other is holding in his hand, and vice versa. 

    if ($round %2 != 0) {   
        $randomMarblesA = rand(1,$number_marbles_A); 
        array_push($randomA, $randomMarblesA); 
        shuffle($guess); 
        array_push($guessValue,$guess[0]); 

        //Compare the guess with the number of marbles. 
        if (($randomMarblesA % 2 == 0 and $guessValue[$round-1] == "even") or ($randomMarblesA % 2 !== 0 and $guessValue[$round-1] == "odd")) {
            $number_marbles_A -= $randomMarblesA;
            $number_marbles_B += $randomMarblesA;
        } else {
            $number_marbles_A += $randomMarblesA;
            $number_marbles_B -= $randomMarblesA;
        }

        // Add the current value of each player into arrays $currentA and $currentB
        array_push($currentA, $number_marbles_A);
        array_push($currentB, $number_marbles_B);

    //In even rounds, Player B hides marbles, Player A guesses.
    } elseif ($round % 2 == 0) {
        $randomMarblesB = rand(1,$number_marbles_B); 
        array_push($randomB, $randomMarblesB); 
        shuffle($guess); 
        array_push($guessValue,$guess[0]); 

        //Compare the guess with the number of marbles. 
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
// Compare the number of marbles of player A and player B. 
#...Final results
if ( $number_marbles_A > $number_marbles_B) {
    $winner = "Player A";
} elseif ($number_marbles_A < $number_marbles_B) {
    $winner = "Player B";
} else {
    $winner = "Tide";
}
// In the view, report the results - player A's move, player B's move, and the winner.
require "index-view.php";
?>

