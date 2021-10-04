<?php
$winner = ""; 
$guess = ["even", "odd"]; 

// Arrays containing the guess of Player A and Player B each round.
$guessValue = []; 

//Arrays containing the current total number of marbles of each player each round.
$currentA = []; $currentB = []; 

// Arrays containing the number of marbles that each player decides to hide each round.
$randomA = []; $randomB = []; 

// Variables containing the number of marble in Player A and Player B each round
$randomMarblesA = 0;$randomMarblesB = 0; 

// Randomly choose the number of marbles at the beginning of the game, from 5 to 10.
$number_marbles_A = $number_marbles_B = $initial_marbles= rand(5,10); 

// For each round, as long as the number of marbles of each player is larger than 0, execute the loop.
for ($round = 1; $number_marbles_A > 0 and $number_marbles_B > 0; $round++) {
    
    // In odd rounds, Player A hides marbles, Player B guesses.
    if ($round %2 != 0) {   
        // For Player A randomly choose the number of marbles
        $randomMarblesA = rand(1,$number_marbles_A); 
        array_push($randomA, $randomMarblesA); 
         // For Player B choose "Odd" or "Even".
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

    //In even rounds, Player B hides marbles, Player A guesses.
    } elseif ($round % 2 == 0) {

        // For Player B randomly choose the number of marbles 
        $randomMarblesB = rand(1,$number_marbles_B); 
        array_push($randomB, $randomMarblesB); 

        // For Player A choose "Odd" or "Even".
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
    }

    array_push($currentA, $number_marbles_A);
    array_push($currentB, $number_marbles_B);
    $count = $round;
}

// Decide the number
if ( $number_marbles_A > $number_marbles_B) {
    $winner = "Player A";
} elseif ($number_marbles_A < $number_marbles_B) {
    $winner = "Player B";
} else {
    $winner = "Tide";
}

require "index-view.php";
?>

