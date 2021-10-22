<?php 
session_start();
//Use isset to only display results of one submission from a form.
if (isset($_POST['submitName'])) {
    $namePlayer = $_POST['namePlayer'];
} 
$_SESSION['results1'] = [
    'namePlayer'=> $namePlayer,
];

header('Location: index.php');




