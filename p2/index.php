<?php
session_start();
$havePlayerInfo = false;
$namePlayer = $playerChoice = "";
//Get the name of the player
if (isset($_SESSION['resultsName'])) {
    $resultsName = $_SESSION['resultsName'];
    if (empty($resultsName['namePlayer'])) {
       //check if the player input their name
        $namePlayer = "Hi there, you have not input your name yet!";
    } else {
        $namePlayer = $resultsName['namePlayer'];
        //check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $namePlayer)) {
            $namePlayer  = "Sorry, only letters and white space are allowed!";
        }
    }
    $_SESSION['resultsName'] = null; 
    $havePlayerInfo = true;
//Get the option that the player chose
} elseif (isset($_SESSION['resultsOptions'])) { 
    $havePlayerInfo = true;
    $resultsOptions= $_SESSION['resultsOptions'];
    $options = ["rock", "paper", "scissors"];
    $computerChoice = $options[array_rand($options, 1)];
    if (empty($resultsOptions['playerChoice'])) {
        // Check if the player does not select an option
        $playerChoice = "playerErr";
    } else {
        $playerChoice= $resultsOptions['playerChoice'];
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
    $_SESSION['resultsOptions'] = null;
}
require 'index-view.php';
