<!doctype html>
<html lang="en">
<head>
    <title> Project 1 </title>
    <meta charset='utf-8'>
</head>
<body>
<!--Introduction-->
<section class="introduction">
<h1>DGMD E2 | Project 1: Odd or Even - Marble Game</h1>
<h3>Huy Quang Nguyen | Student ID: 71407772 </h3>
<p>huynguyen@g.harvard.edu</p>
<!--Mechanics-->
<h2>Mechanics</h2>
    <ul>
        <li> Initially, Player A and Player B each have an equal number of marbles, randomly from 5 to 10.</li>
        <li> Player A has to hide some number of marbles in their fist.</li>
        <li> Player B needs to guess whether Player A has an odd or even number of marbles.</li>
        <li> Player B receives those marbles from Player A if the guess is correct and vice versa.</li>
        <li> Successively, Player B will get their turn to play.</li>
        <li> At the end, whoever has lost all their marbles first is the loser.</li>
    </ul>
</section>
<!--Result section-->
<section class="result">
    <h2>Results</h2>
    <p>Rounds played: <?php echo ($round-1);?></p>
    <p>Winner: <?php echo $winner;?> </p>
</section>  
<!--Game-->
<section class="game">
<h2>Rounds</h2><hr>
<p> Initially, each player has <?php echo $initial_marbles;?> marbles.</p><hr>
<?php
    //Display the result of each round.
    $i = 1; $j = 2;
    for ($roundView =1; $roundView < $round; $roundView++) {
    ?><h2>Round <?php echo $roundView ?></h2><?php
    if ($roundView %2 != 0) {  
        if ($randomA[$roundView-$i] > 1) {
            ?><p>Player A chose <?php  echo $randomA[$roundView-$i]; ?> marbles to hide.</p><?php
        } else {
            ?><p>Player A chose <?php  echo $randomA[$roundView-$i]; ?> marble to hide.</p><?php
        }
        ?><p>Player B chose <?php  echo $guessValue[$roundView-1]; ?>.</p><?php
        if (($randomA[$roundView-$i] % 2 == 0 and $guessValue[$roundView-1] == "even") or ($randomA[$roundView-$i] % 2 !== 0 and $guessValue[$roundView-1] == "odd")) {
            ?><p>Player B is correct. Player B wins.</p><?php
        } else {
            ?><p>Player B is incorrect. Player A wins.</p><?php
        }
        $i = $i + 1; 
    } elseif ($roundView %2 == 0) {
        if ($randomB[$roundView-$j] > 1) {
            ?><p>Player B chose <?php  echo $randomB[$roundView-$j]; ?> marbles to hide.</p><?php
        }else {
            ?><p>Player B chose <?php  echo $randomB[$roundView-$j]; ?> marble to hide.</p><?php
        }
        ?><p>Player A chose <?php  echo $guessValue[$roundView-2]; ?>.</p><?php
        if (($randomB[$roundView-$j] % 2 == 0 and $guessValue[$roundView-2] == "even") or ($randomB[$roundView-$j] % 2 !== 0 and $guessValue[$roundView-2] == "odd")) {
            ?><p>Player A is correct. Player A wins.</p><?php
        } else {
            ?><p>Player A is incorrect. Player B wins.</p><?php
        }
        $j = $j + 1;
    }
    // The number of marbles cannot be negative. The minimum number of marbles in each player's hand is 0.
    if ($currentA[$roundView-1] > ($initial_marbles * 2)) {
        ?><p>The current number of marbles - Player A: <?php  echo ($initial_marbles * 2);?></p><?php
        ?><p>The current number of marbles - Player B: <?php  echo "0";?></p><hr><?php
    } elseif ($currentB[$roundView-1] > ($initial_marbles * 2)) {
        ?><p>The current number of marbles - Player A: <?php  echo "0";?></p><?php
        ?><p>The current number of marbles - Player B: <?php  echo ($initial_marbles * 2);?></p><hr><?php
    } else {
        ?><p>The current number of marbles - Player A: <?php  echo $currentA[$roundView-1];?></p><?php
        ?><p>The current number of marbles - Player B: <?php  echo $currentB[$roundView-1];?> </p><hr><?php
    }
}
?>
</section>
</body>
</html>
