<?php 
// Create a function
function flipCoin() 
{
    $coin = ['head', 'tails'];
    return $coin[rand(0,1)];
}
// Call a function
$flip = flipCoin();
$winner = $flip == "head" ? "player A" : "player B";
echo $flip;
echo $winner;
//Play 10 rounds

