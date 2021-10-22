<?php 
session_start();
//Use isset to only display results of one submission from a form.
if (isset($_POST['submitGame'])) {
    $playerChoice = $_POST['playerChoice'];
}
$_SESSION['results2'] = [
    'playerChoice'=> $playerChoice,
];

header('Location: index.php');






