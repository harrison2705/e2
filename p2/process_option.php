<?php 
 session_start();
$playerChoice = false;
$playerChoice = isset($_POST['submitGame']) ? $_POST['playerChoice'] : '';

$_SESSION['resultsOptions'] = [
    'playerChoice'=> $playerChoice,
];
header('Location: index.php');






