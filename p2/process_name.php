<?php
session_start();

$namePlayer = isset($_POST['submitName']) ? $_POST['namePlayer'] : '';

$_SESSION['results1'] = [
    'namePlayer'=> $namePlayer,
    ];

header('Location: index.php');
