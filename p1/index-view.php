<!doctype html>
<html lang="en">
<head>
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
<h2>Game</h2><hr>
<p> Initially, each player has <?php echo $initial_marbles;?> marbles.</p><hr>
<?php
    for($roundView = 1; $roundView < $round; $roundView++) {
        ?><h3> Round <?php echo $roundView?> </h3><?php   
    if($roundView %2 != 0) {
        ?><p> Player A chose <?php echo $randomMarblesA;?> marbles.</p><?php
        ?><p> Player B chose <?php echo $guess[0];?>.</p> <?php
            if($playerBWin == "Player B Win") {
                ?><p> Player B is correct. Player B wins.</p> <?php
            } elseif ($playerWin = "Player B Lose"){
                ?><p> Player B is incorrect. Player A wins.</p><?php
            }
    } else {
            ?><p> Player B chose <?php echo $randomMarblesB;?> marbles.</p><?php 
            ?><p> Player A chose <?php echo $guess[0];?>.</p><?php
            if($playerAWin == "Player A Win") {
                ?><p> Player A is correct. Player A wins.</p> <?php
            } elseif ( $playerAWin = "Player A Lose") {
                ?><p> Player A is incorrect. Player B wins.</p><?php 
            }
    }   
        if ($currentA[($roundView-1)] >= ($initial_marbles * 2)) {
            ?><p> Current number of marbles: Player A: <?php echo ($initial_marbles *2);?>.</p>
            <p> Current number of marbles: Player B: <?php echo 0;?>.</p><hr><?php 
        } elseif ($currentB[($roundView-1)] >= ($initial_marbles * 2)) {
            ?><p> Current number of marbles: Player A: <?php echo 0;?>.</p><?php
            ?><p> Current number of marbles: Player B: <?php echo ($initial_marbles * 2);?>.</p><hr><?php
        } else {
            ?><p> Current number of marbles: Player A: <?php echo $currentA[$roundView -1];?>.</p>
            <p> Current number of marbles: Player B: <?php echo $currentB[$roundView - 1];?>.</p><hr><?php
        }
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
