<?php
error_reporting( error_reporting() & ~E_NOTICE );
session_start();
$havePlayerInfo = false;
$namePlayer = $playerChoice = "";

//Get the name of the player
if (!is_null($_SESSION['results1'])) {
    $results1 = $_SESSION['results1'];
    if (empty($results1['namePlayer'])) {
       //check if the player input their name
        $namePlayer = "Hi there, you have not input your name yet!";
    } else {
        $namePlayer = $results1['namePlayer'];
        //check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $namePlayer)) {
            $namePlayer  = "Sorry, only letters and white space are allowed!";
        }
    }
    $_SESSION['results1'] = null; 
    $havePlayerInfo = true;
}
//Get the option that the player chose
if (!is_null($_SESSION['results2'])) {
    $havePlayerInfo = true;
    $results2 = $_SESSION['results2'];
    $options = ["rock", "paper", "scissors"];
    $computerChoice = $options[array_rand($options, 1)];
    if (empty($results2['playerChoice'])) {
        //check if the player does not select an option
        $playerChoice = "playerErr";
    } else {
        $playerChoice= $results2['playerChoice'];
        // Compare player and computer's options
        if ($playerChoice == $computerChoice) {
            $winner= 'tie';
        } elseif ($computerChoice == "rock") {
            $winner= $playerChoice == "scissors" ? 'computer' : 'player';
        } elseif ($computerChoice == "paper") {
            $winner = $playerChoice == "rock" ? 'computer' : 'player';
        } elseif ($computerChoice == "scissors") {
            $winner = $playerChoice == "paper" ? 'computer' : 'player';
        }
    }
    $_SESSION['results2'] = null;
}
require 'index-view.php';
