<!doctype html>
<html lang="en">
<head>
</head>
<body>
<!--Introduction-->
<section class="introduction">
<h1>Game: Odd or Even - Marble Game</h1>
<h3>Huy Quang Nguyen | Student ID: 71407772 </h3>
<p>huynguyen@g.harvard.edu</p>
<!--Mechanics-->
<h2>Mechanics</h2>
    <ul>
        <li> Initially, Player A and Player B each have an equal number of marbles, from 5 to 10.</li>
        <li> Player A has to hide some number of marbles in their fist.</li>
        <li> Player B needs to guess whether Player A has an odd or even number of marbles.</li>
        <li> Player B receives those marbles from Player A if the guess is correct and vice versa.</li>
        <li> Successively, Player B will get their turn to play.</li>
        <li> At the end, whoever has lost all their marbles first is the loser.</li>
    </ul>
</section>
<!--Game-->
<section class="game">
<h2>Game</h2>
<?php
$winner = "";
$number_marbles_A = $number_marbles_B = rand(5,10);
$guess = ["even", "odd"];
?><hr><p> Initially, each player has <?php echo $number_marbles_A;?> marbles.</p><hr><?php

for ($round =1; $number_marbles_A > 0 and $number_marbles_B > 0; $round++) {
    ?><h3> Round <?php echo $round?> </h3> <?php
    if ($round %2 != 0) {
    //If $round is odd, Player A hides marbles, Player B guesses
    $randomMarblesA = rand(1,$number_marbles_A);
    ?><p> Player A chose <?php echo $randomMarblesA;?> marbles.</p><?php
    shuffle($guess);
    ?><p> Player B chose <?php echo $guess[0];?>.</p><?php
        if (($randomMarblesA % 2 == 0 and $guess[0] == "even") or ($randomMarblesA % 2 !== 0 and $guess[0] == "odd")) {
            ?><p> Player B is correct. Player B wins.</p>
            <?php
            $number_marbles_A -= $randomMarblesA;
            $number_marbles_B += $randomMarblesA;
        } else {
            ?><p> Player B is incorrect. Player A wins.</p>
            <?php
            $number_marbles_A += $randomMarblesA;
            $number_marbles_B -= $randomMarblesA;
        }
    } else {
    //If $round is even, Player B hides marbles, Player A guesses
    $randomMarblesB = rand(1,$number_marbles_B);
    ?><p> Player B chose <?php echo $randomMarblesB;?> marbles.</p><?php
    shuffle($guess);
    ?><p> Player A chose <?php echo $guess[0];?>.</p><?php
        if (($randomMarblesB % 2 == 0 and $guess[0] == "even") or ($randomMarblesB % 2 !== 0 and $guess[0] == "odd")) {
            ?><p> Player A is correct. Player A wins.</p>
            <?php
            $number_marbles_B -= $randomMarblesB;
            $number_marbles_A += $randomMarblesB;    
        } else {
            ?><p> Player A is incorrect. Player B wins.</p>
            <?php
            $number_marbles_B += $randomMarblesB;
            $number_marbles_A -= $randomMarblesB;       
        }
    }
    $count = $round;
    ?><p> Current number of marbles: Player A: <?php echo $number_marbles_A;?> marbles.</p><?php
    ?><p> Current number of marbles: Player B: <?php echo $number_marbles_B;?> marbles.</p><hr><?php
}
#...Final results
if ( $number_marbles_A > $number_marbles_B) {
    $winner = "Player A";
} elseif ($number_marbles_A < $number_marbles_B) {
    $winner = "Player B";
} else {
    $winner = "Tide";
}
?>
</section>
<!--Result section-->
<section class="result">
    <h2>Results</h2>
    <p>Rounds played: <?php echo $count;?></p>
    <p>Winner: <?php echo $winner;?> </p>
</section>  
</body>
</html>
