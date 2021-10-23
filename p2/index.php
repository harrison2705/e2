<?php
session_start();
$havePlayerInfo = false;
$namePlayer = $playerChoice = "";

if (!is_null($_SESSION['results1'])) {
    $results1 = $_SESSION['results1'];

    if (empty($results1['namePlayer'])) {
        $namePlayer = "Hi there, you have not input your name yet. Please do so!";
    } else {
        $namePlayer = $results1['namePlayer'];
        //check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $namePlayer)) {
            $namePlayer  = "Sorry, only letters and white space allowed! Can you please input your name again?";
        }
    } 
    $_SESSION['results1'] = null;
    $havePlayerInfo = true;
}

if (!is_null($_SESSION['results2'])) {
    $havePlayerInfo = true;
    $results2 = $_SESSION['results2'];

    $options = ["rock", "paper", "scissors"];
    $computerChoice = $options[array_rand($options, 1)];

    if(empty($results2['playerChoice'])) {
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