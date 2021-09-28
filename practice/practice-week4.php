<?php 
#...Create two arrays containing number of mables for each player
$playerA = [1,2,3,4,5];
$playerB = [1,2,3,4,5];

$number_mables_A = 5;
$number_mables_B = 5;

#...Round 1 - Player A: holds, Player B: guesses
echo "ROUND 1\n";
$randomMables1 = rand(1,$number_mables_A);
echo "Player A chose ", $randomMables1, " mables.\n";
$guess1 = rand(0,1);
if ($guess1 == 0) {
    echo "Player B chose ODD.\n";
} else {
    echo "Player B chose EVEN.\n";
}
if ($randomMables1 % 2 == 0 and $guess1 == 1) {
    echo "Player B is correct. Player B wins. \n";
    $new_number_mables_A = $number_mables_A - $randomMables1;
    $new_number_mables_B = $number_mables_B + $randomMables1;
    echo "Current number of mables: Player A ", $new_number_mables_A, ".\n";
    echo "Current number of mables: Player B ", $new_number_mables_B, ".\n";
} elseif ($randomMables1 % 2 !== 0 and $guess1 == 0){
    echo "Player B is correct. Player B wins. \n";
    $new_number_mables_A = $number_mables_A - $randomMables1;
    $new_number_mables_B = $number_mables_B + $randomMables1;
    echo "Current number of mables: Player A ", $new_number_mables_A, ".\n";
    echo "Current number of mables: Player B ", $new_number_mables_B, ".\n";
} else {
    echo "Player B is incorrect. Player A wins. \n";
    $new_number_mables_A = $number_mables_A + $randomMables1;
    $new_number_mables_B = $number_mables_B - $randomMables1;
    echo "Current number of mables: Player A ", $new_number_mables_A, ".\n";
    echo "Current number of mables: Player B ", $new_number_mables_B, ".\n";
}
#...Round 2 - Player B: holds, Player A: guesses
echo "\nROUND 2 \n";
$randomMables2 = rand(1, $new_number_mables_B);
echo "Player B chose ", $randomMables2, " mables.\n";
$guess2 = rand(0,1);
if ($guess2 == 0) {
    echo "Player A chose ODD.\n";
} else {
    echo "Player A chose EVEN.\n";
}
if ($randomMables2 % 2 == 0 and $guess1 == 1) {
    echo "Player A is correct. Player A wins. \n";
    $new_number_mables_A_2 = $new_number_mables_A + $randomMables2;
    $new_number_mables_B_2 = $new_number_mables_B - $randomMables2;
    echo "Current number of mables: Player A ", $new_number_mables_A_2, ".\n";
    echo "Current number of mables: Player B ", $new_number_mables_B_2, ".\n";
} elseif ($randomMables1 % 2 !== 0 and $guess1 == 0){
    echo "Player A is correct. Player A wins. \n";
    $new_number_mables_A_2 = $new_number_mables_A + $randomMables2;
    $new_number_mables_B_2 = $new_number_mables_B - $randomMables2;
    echo "Current number of mables: Player A ", $new_number_mables_A_2, ".\n";
    echo "Current number of mables: Player B ", $new_number_mables_B_2, ".\n";
} else {
    echo "Player A is incorrect. Player B wins. \n";
    $new_number_mables_A_2 = $new_number_mables_A - $randomMables2;
    $new_number_mables_B_2 = $new_number_mables_B + $randomMables2;
    echo "Current number of mables: Player A ", $new_number_mables_A_2, ".\n";
    echo "Current number of mables: Player B ", $new_number_mables_B_2, ".\n";
}

#...Round 3 - Player A: holds, Player B: guesses
echo "\nROUND 3 \n";
$randomMables3 = rand(1, $new_number_mables_A_2);
echo "Player A chose ", $randomMables3, " mables.\n";
$guess3 = rand(0,1);
if ($guess3 == 0) {
    echo "Player B chose ODD.\n";
} else {
    echo "Player B chose EVEN.\n";
}
if ($randomMables3 % 2 == 0 and $guess3 == 1) {
    echo "Player B is correct. Player B wins. \n";
    $new_number_mables_A_3 = $new_number_mables_A_2 + $randomMables3;
    $new_number_mables_B_3 = $new_number_mables_B_2 - $randomMables3;
    echo "Current number of mables: Player A ", $new_number_mables_A_3, ".\n";
    echo "Current number of mables: Player B ", $new_number_mables_B_3, ".\n";
} elseif ($randomMables1 % 2 !== 0 and $guess1 == 0){
    echo "Player B is correct. Player B wins. \n";
    $new_number_mables_A_3 = $new_number_mables_A_2 + $randomMables3;
    $new_number_mables_B_3 = $new_number_mables_B_2 - $randomMables3;
    echo "Current number of mables: Player A ", $new_number_mables_A_3, ".\n";
    echo "Current number of mables: Player B ", $new_number_mables_B_3, ".\n";
} else {
    echo "Player B is incorrect. Player A wins. \n";
    $new_number_mables_A_3 = $new_number_mables_A_2 - $randomMables3;
    $new_number_mables_B_3 = $new_number_mables_B_2 + $randomMables3;
    echo "Current number of mables: Player A ", $new_number_mables_A_3, ".\n";
    echo "Current number of mables: Player B ", $new_number_mables_B_3, ".\n";
}

#...Final results
echo "\nFINAL RESULTS \n";
if ( $new_number_mables_A_3 > $new_number_mables_B_3) {
    echo "Player A finally wins. \n";
} elseif ($new_number_mables_A_3 < $new_number_mables_B_3) {
    echo "Player B finally wins. \n";
} else {
    echo "Player A and Player B tied. \n";
}

?>

