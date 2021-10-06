<!doctype html>
<html lang="en">
<head>
    <title> Project 1 </title>
    <meta charset='utf-8'>
</head>

<body>
    <!--Introduction-->
    <section class="introduction">
        <h1> DGMD E2 | Project 1: Odd or Even - Marble Game</h1>
        <h3> Huy Quang Nguyen | Student ID: 71407772 </h3>
        <p> huynguyen@g.harvard.edu</p>
        <!--Mechanics-->
        <h2>Mechanics</h2>
            <ul>
                <li> Initially, Player A and Player B each have an equal number of marbles, randomly from 5 to 10.</li>
                <li> Player A has to hide some number of marbles in their fist. The number of marbles must be larger than 1</li>
                <li> Player B needs to guess whether Player A has an odd or even number of marbles.</li>
                <li> Player B receives those marbles from Player A if the guess is correct and vice versa.</li>
                <li> Successively, Player B will get their turn to play.</li>
                <li> At the end, whoever has lost all their marbles first is the loser.</li>
                <li> The number of marbles of each player cannot be negative. The minimum number of marbles in each player's hand is 0.</li>
            </ul>
    </section>
    <!--Result section-->
    <section class="result">
        <h2> Results </h2>
        <p> Rounds played: <?php echo ($round-1);?></p>
        <p> Winner: <?php echo $winner;?> </p>
    </section>  
    <!--Game-->
    <section class="game">
        <h2> Rounds </h2><hr>
        <p> Initially, each player has <?php echo $initial_marbles;?> marbles.</p><hr>
            <?php
            $roundOdd = 1; $roundEven = 2;
            for ($roundDisplay = 1; $roundDisplay < $round; $roundDisplay++) {

                //Display the round number
                ?><h2> Round <?php echo $roundDisplay ?></h2><?php

                // Odd rounds
                if ($roundDisplay % 2 != 0) { 

                    // Player A's hidden marbles 
                    if ($randomA[$roundDisplay - $roundOdd] > 1) {
                        ?><p> Player A chose <?php  echo $randomA[$roundDisplay - $roundOdd]; ?> marbles to hide.</p><?php
                    } else {
                        ?><p> Player A chose <?php  echo $randomA[$roundDisplay - $roundOdd]; ?> marble to hide.</p><?php
                    }
                    // Player B's guess
                    ?><p>Player B chose <?php  echo $guessValue[$roundDisplay - 1]; ?>.</p><?php

                    // Display results of odd rounds
                    if($winnerRound[$roundDisplay -1] == "Player B") {
                        ?><p>Player B is correct. Player B wins.</p><?php
                    } else {
                        ?><p>Player B is incorrect. Player A wins.</p><?php
                    }
                    $roundOdd = $roundOdd + 1; 
                    
                // Even rounds
                } elseif ($roundDisplay % 2 == 0) {

                    // Player B's hidden marbles
                    if ($randomB[$roundDisplay-$roundEven ] > 1) {
                        ?><p>Player B chose <?php  echo $randomB[$roundDisplay - $roundEven]; ?> marbles to hide.</p><?php
                    } else {
                        ?><p>Player B chose <?php  echo $randomB[$roundDisplay - $roundEven]; ?> marble to hide.</p><?php
                    }
                    // Player A's guess
                    ?><p>Player A chose <?php  echo $guessValue[$roundDisplay - 2]; ?>.</p><?php

                    // Display results of even rounds
                    if($winnerRound[$roundDisplay -1] == "Player A") {
                        ?><p>Player A is correct. Player A wins.</p><?php
                    } else {
                        ?><p>Player A is incorrect. Player B wins.</p><?php
                    }
                    $roundEven = $roundEven + 1;
                }
                    ?><p>The current number of marbles - Player A: <?php  echo $currentA[$roundDisplay - 1];?></p><?php
                    ?><p>The current number of marbles - Player B: <?php  echo $currentB[$roundDisplay - 1];?> </p><hr><?php
            }
            ?>
    </section>
</body>
</html>
