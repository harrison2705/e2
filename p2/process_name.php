<?php
session_start();

$namePlayer = isset($_POST['submitName']) ? $_POST['namePlayer'] : '';

$_SESSION['resultsName'] = [
    'namePlayer'=> $namePlayer,
];
header('Location: index.php');
