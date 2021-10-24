<?php
session_start();

$namePlayer = isset($_GET['submitName']) ? $_GET['namePlayer'] : '';
$_SESSION['results1'] = [
    'namePlayer'=> $namePlayer,
];
header('Location: index.php');
