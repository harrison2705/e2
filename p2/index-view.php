<!doctype html>
<html lang="en">
<head>
    <title> DGMD E-1 | Project 2 </title>
    <meta charset='utf-8'>
</head>

<body>
    <!--Introduction-->
    <section class="introduction">
        <h1> DGMD E2 | Project 2: Roshambo</h1>
        <h3> Huy Quang Nguyen | Student ID: 71407772 </h3>
        <p> huynguyen@g.harvard.edu</p>

        <h2> Game rules </h2>
            <ul>
                <li> Player inputs their name and choose one of three options: rock, paper, and scissors.</li>
                <li> Player clicks on Roshambo button and the screen displays results </li>
                <li> Scissors cuts paper, paper covers rock and rock crushes scissors. </li>
            </ul>
    </section>
    <hr>
    <!-- Game -->
    <section> 
        <h2>Game: ROSHAMBO</h2>
       <!--Form to input player's name -->

        <?php if(!$havePlayerInfo) { ?>
            <form method = 'POST' action = 'process_name.php' class = 'form'>
                <div>
                    <label for = 'namePlayer'> Can you please tell us your name?</label>
                    <input type = 'text' id = 'namePlayer' name = 'namePlayer'>
                    <button type = 'submit' name='submitName'>Of course!</button>
                </div>
            </form>
        <?php } ?>
        <!--Form to display options -->
        <?php if(isset($results1)) {
                if ($namePlayer == $results1['namePlayer']){?>
                    <p>Hello <?php echo $namePlayer?>!</p>
                    <p> I guess you already know the rule. So, what is your option?</p>
                    <form action="process_option.php" method="POST">
                        <input type="radio" name="playerChoice" value="rock" id="rock"><label for ="rock">Rock</label>
                        <input type="radio" name="playerChoice" value="paper" id="papper"><label for ="papper">Paper</label>
                        <input type="radio" name="playerChoice" value="scissors" id="scissors"><label for ="scissors">Scissors</label>
                        <input type="submit" name="submitGame" value="Roshambo"/>
                    </form>
                 <?php
                } else { ?>
                    <p> <?php echo $namePlayer?></p>
                    <form method = 'POST' action = 'process_name.php' class = 'form'>
                        <div>
                        <label for = 'namePlayer'> Can you please tell us your name?</label>
                        <input type = 'text' id = 'namePlayer' name = 'namePlayer'>
                        <button type = 'submit' name='submitName'>Of course!</button>
                    </div>
                    </form>
                <?php }
            } ?>

        <?php 
            if (isset($results2)) {
                if (($playerChoice !== "") and ($playerChoice != "playerErr")) {?> 
                    <p>You chose <?php echo $playerChoice?>.</p>
                    <p>Computer chose <?php echo $computerChoice?>.</p>
                    <?php
                        // Decide the winner
                        if ($winner == "computer") {
                            ?><p>Computer wins!</p><?php
                        } elseif ($winner == "player") {
                            ?><p> You wins!</p><?php
                        } elseif ($winner == "tie") {
                            ?><p>Ties!</p><?php
                        }?>
                        <!--Form to play again-->
                        <form method = 'POST' action = 'process_playAgain.php' class = 'form'>
                            <div>
                            <button type = 'submit' name='playAgain'>Start from the beginning?</button>
                            </div>
                        </form><?php
                    } else {?> 
                        <p>You must select one option below!</p>
                        <form action="process_option.php" method="POST">
                            <input type="radio" name="playerChoice" value="rock" id="rock"><label for ="rock">Rock</label>
                            <input type="radio" name="playerChoice" value="paper" id="papper"><label for ="papper">Paper</label>
                            <input type="radio" name="playerChoice" value="scissors" id="scissors"><label for ="scissors">Scissors</label>
                            <input type="submit" name="submitGame" value="Roshambo"/>
                        </form>
                    <?php } 

            } ?>
    </section>

   
</body>
</html>
