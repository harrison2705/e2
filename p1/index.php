<?php
// Array containing two values "Even" and "Odd"
$guess = ["even", "odd"]; 

// Arrays containing the guess of Player A and Player B in each round.
$guessValue = []; 

// Arrays containing the current total number of marbles of each player in each round.
$currentA = []; $currentB = []; 

// Arrays containing the number of marbles that each player decides to hide each round.
$randomA = []; $randomB = []; 

// An array showing the winner of each round.
$winnerRound = [];

// Variables containing the number of marble in Player A and Player B in each round
$randomMarblesA = 0; $randomMarblesB = 0; 

// Randomly choose the number of marbles at the beginning of the game, from 5 to 10.
$numberMarblesA = $numberMarblesB = $initialMarbles= rand(5,10); 

// For each round, as long as the number of marbles of each player is larger than 0, execute the loop.
for ($round = 1; $numberMarblesA > 0 and $numberMarblesB > 0; $round++) {
    
    // In odd rounds, Player A hides marbles, Player B guesses.
    if ($round %2 != 0) {   

        // For Player A randomly choose the number of marbles
        $randomMarblesA = rand(1,$numberMarblesA); 
        array_push($randomA, $randomMarblesA); 

         // For Player B choose "Odd" or "Even".
        shuffle($guess); 
        array_push($guessValue,$guess[0]); 

        //Compare the guess with the number of marbles. 
        if (($randomMarblesA % 2 == 0 and $guessValue[$round-1] == "even") or ($randomMarblesA % 2 !== 0 and $guessValue[$round-1] == "odd")) {
            $numberMarblesA -= $randomMarblesA;
            $numberMarblesB += $randomMarblesA;
            $winnerPlayer = "Player B";
        } else {
            $numberMarblesA += $randomMarblesA;
            $numberMarblesB -= $randomMarblesA;
            $winnerPlayer = "Player A";
        }
        array_push($winnerRound, $winnerPlayer);
        
    //In even rounds, Player B hides marbles, Player A guesses.
    } elseif ($round % 2 == 0) {

        // For Player B randomly choose the number of marbles 
        $randomMarblesB = rand(1,$numberMarblesB); 
        array_push($randomB, $randomMarblesB); 

        // For Player A choose "Odd" or "Even".
        shuffle($guess); 
        array_push($guessValue,$guess[0]); 

        //Compare the guess with the number of marbles. 
        if (($randomMarblesB % 2 == 0 and $guessValue[$round-2] == "even") or ($randomMarblesB % 2 !== 0 and $guessValue[$round-2] == "odd")) {
            $numberMarblesB -= $randomMarblesB;
            $numberMarblesA += $randomMarblesB; 
            $winnerPlayer = "Player A"; 
        } else {
            $numberMarblesB += $randomMarblesB;
            $numberMarblesA -= $randomMarblesB; 
            $winnerPlayer = "Player B";  
        } 
        array_push($winnerRound, $winnerPlayer);

        // The number of marbles cannot be negative. The minimum number of marbles in each player's hand is 0.
        if ($numberMarblesA > ($initialMarbles * 2)) {
            $numberMarblesA = $initialMarbles * 2;
            $numberMarblesB = 0;
        } elseif ($numberMarblesB > ($initialMarbles * 2)) {
            $numberMarblesB = $initialMarbles * 2;
            $numberMarblesA = 0;
        }
    }
    array_push($currentA, $numberMarblesA);
    array_push($currentB, $numberMarblesB);
    $count = $round;
}
// Decide the winner
if ( $numberMarblesA > $numberMarblesB) {
    $winner = "Player A";
} elseif ($numberMarblesA < $numberMarblesB) {
    $winner = "Player B";
} else {
    $winner = "Tide";
}

require "index-view.php";
?>

