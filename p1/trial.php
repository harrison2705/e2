<?php

$number_marbles_A = 5;
$number_marbles_B = 5;
$guess = ["even", "odd"];

echo "Initially, player A has ", $number_marbles_A, " marbles.\n";
echo "Initially, player B has ", $number_marbles_B, " marbles.\n\n";

for ($round =1; $number_marbles_A > 0 and $number_marbles_B > 0; $round++) {
    if ($round %2 != 0) {
    //If $round is odd, Player A holds marbles, Player B guesses

    $randomMarblesA = rand(1,$number_marbles_A);
    echo "Player A chose ", $randomMarblesA, " marbles.\n";
    shuffle($guess);
    echo "Player B chose ", $guess[0], ".\n";
        if ($randomMarblesA % 2 == 0 and $guess[0] == "even") {
            echo "Player B is correct. Player B wins. \n";
            $number_marbles_A -= $randomMarblesA;
            $number_marbles_B += $randomMarblesA;
            echo "Current number of marbles: Player A: ", $number_marbles_A, ".\n";
            echo "Current number of marbles: Player B: ", $number_marbles_B, ".\n\n";
        } elseif ($randomMarblesA % 2 !== 0 and $guess[0] == "odd"){
            echo "Player B is correct. Player B wins. \n";
            $number_marbles_A -= $randomMarblesA;
            $number_marbles_B += $randomMarblesA;
            echo "Current number of marbles: Player A: ", $number_marbles_A, ".\n";
            echo "Current number of marbles: Player B: ", $number_marbles_B, ".\n\n";
        } else {
             echo "Player B is incorrect. Player A wins. \n";
            $number_marbles_A += $randomMarblesA;
            $number_marbles_B -= $randomMarblesA;
            echo "Current number of marbles: Player A: ", $number_marbles_A, ".\n";
            echo "Current number of marbles: Player B: ", $number_marbles_B, ".\n\n";
        }
    } else {
    //If $round is even, Player B holds marbles, Player A guesses
    $randomMarblesB = rand(1,$number_marbles_B);
    echo "Player B chose ", $randomMarblesB, " marbles.\n";
    shuffle($guess);
    echo "Player A chose ", $guess[0], ".\n";
        if ($randomMarblesB % 2 == 0 and $guess[0] == "even") {
            echo "Player A is correct. Player A wins. \n";
            $number_marbles_B -= $randomMarblesB;
            $number_marbles_A += $randomMarblesB;
            echo "Current number of marbles: Player A ", $number_marbles_A, ".\n";
            echo "Current number of marbles: Player B ", $number_marbles_B, ".\n\n";
        } elseif ($randomMarblesB % 2 !== 0 and $guess[0] == "odd"){
            echo "Player AB is correct. Player A wins. \n";
            $number_marbles_B -= $randomMarblesB;
            $number_marbles_A += $randomMarblesB;
            echo "Current number of marbles: Player A: ", $number_marbles_A, ".\n";
            echo "Current number of marbles: Player B: ", $number_marbles_B, ".\n\n";
        } else {
             echo "Player B is incorrect. Player A wins. \n";
            $number_marbles_B += $randomMarblesB;
            $number_marbles_A -= $randomMarblesB;
            echo "Current number of marbles: Player A: ", $number_marbles_A, ".\n";
            echo "Current number of marbles: Player B: ", $number_marbles_B, ".\n\n";
        }
    }
}
#...Final results
echo "\nFINAL RESULTS \n";
if ( $number_marbles_A > $number_marbles_B) {
    echo "Player A finally wins. \n";
} elseif ($number_marbles_A < $number_marbles_B) {
    echo "Player B finally wins. \n";
} else {
    echo "Player A tides Player B. \n";
}

?>