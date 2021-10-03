<?php
$winner = ""; // Create an empty varible $winner to determine who is the winner of the game
$number_marbles_A = $number_marbles_B = $initial_marbles= rand(5,10); // Randomly choose the number of marbles in the beginning of the game, from 5 to 10
$guess = ["even", "odd"]; // Create an array containing value of "even" and "odd"
$guessValue = []; // an array to contain the guess value of Player A and player B
$currentA = []; $currentB = []; //Create arrays containing the current number of marbles of Player A and Player B in each round
$randomA = []; $randomB = []; // Create arrays containing numbers of marbles of Player A and Player B hiding in each round
$randomMarblesA = 0;$randomMarblesB = 0; // Create two variables containing the number of marble in Player A and Player B in each round

// + For each round, as long as the number of marbles of player A and player B are larger than 0, execute the loop
for ($round = 1; $number_marbles_A > 0 and $number_marbles_B > 0; $round++) {
    //If $round is odd, Player A hides marbles, Player B guesses
    if ($round %2 != 0) {   
        $randomMarblesA = rand(1,$number_marbles_A); // Player A randomly chose a number of marbles that is bigger than 0
        array_push($randomA, $randomMarblesA); // Add the value to the end of array randomA
        shuffle($guess); // Randomize the guess value in the array $guess
        array_push($guessValue,$guess[0]); // Add the first guess value into the $guessValue

        //Compare the guess with the number of marbles. If Player B is correct, add the number of marbles from Player A to Player B and vice versa.
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

    //If $round is even, Player B hides marbles, Player A guesses
    } elseif ($round % 2 == 0) {
        $randomMarblesB = rand(1,$number_marbles_B); // Player B randomly chose a number of marbles that is bigger than 0
        array_push($randomB, $randomMarblesB); // Add the value to the end of array randomB
        shuffle($guess); //+ Another player randomly choose "even" or "odd"
        array_push($guessValue,$guess[0]); // Randomize the guess value in the array $guess

        //Compare the guess with the number of marbles. If Player A is correct, add the number of marbles from Player B to Player A and vice versa.
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
// Compare the number of marbles of player A and player B. In the view, report the results - player A's move, player B's move, and the winner
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

