<?php 
session_start();
$playerChoice = false;
$playerChoice = isset($_GET['submitGame']) ? $_GET['playerChoice'] : '';
$_SESSION['results2'] = [
    'playerChoice'=> $playerChoice,
];
header('Location: index.php');






