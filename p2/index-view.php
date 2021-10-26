<!doctype html>
<html lang="en">
<head>
    <title> DGMD E-1 | Project 2 </title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/bfc1736198.js" crossorigin="anonymous"></script>
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
                <li> Player can choose to play again or restart the game.</li>
            </ul>
    </section>
    <!-- Game -->
    <section class="gameSection"> 
        <img src='img/game_logo.png' class="logo">
        <h2 class="name">ROSHAMBO</h2>
        <!--Form where the player inputs their name -->
        <?php if(!$havePlayerInfo) { 
            ?><form method = 'POST' action = 'process_name.php' class = 'form'>
                <div>
                    <label for = 'namePlayer'>Can you please tell us your name?</label>
                    <input type = 'text' id = 'namePlayer' name = 'namePlayer'>
                    <button type = 'submit' name='submitName'>Let's go!</button>
                </div>
            </form><?php
        }
        //Form to display options -->
        if(isset($resultsName)) {
            if ($namePlayer == $resultsName['namePlayer']){?>
                <p>Hello <?php echo $namePlayer?>!</p>
                <p> Rock, Paper or Scissors? What is your choice?</p>        
                <form action="process_option.php" method="POST">
                    <div class="optionArea">
                    <input class= "option" type="radio" name="playerChoice" value="rock" id="rock" <?php echo (isset($playerChoice) and $playerChoice=="rock") ? "checked" : "" ?>>
                    <label class="<?php echo($playerChoice=="rock") ? "img_checked" : ""?> image rockimg" for ="rock" >Rock</label>

                    <input class= "option" type="radio" name="playerChoice" value="paper" id="papper" <?php echo (isset($playerChoice) and $playerChoice=="paper") ? "checked" : "" ?>>
                    <label class="<?php echo($playerChoice=="paper") ? "img_checked" : ""?> image paperimg" for ="papper">Paper</label>

                    <input class= "option" type="radio" name="playerChoice" value="scissors" id="scissors" <?php echo (isset($playerChoice) and $playerChoice=="scissors") ? "checked" : "" ?>>
                    <label class="<?php echo($playerChoice=="scissors") ? "img_checked" : ""?> image scissorsimg" for ="scissors">Scissors</label>
                    </div>
                    <button type="submit" name="submitGame" >Roshambo</button>
                </form>
                <input class="restart" type="button" onclick = "location.href='index.php';" value = "Go back?"><?php
            } else { ?>
                <p><?php echo $namePlayer?></p>
                <form method = 'POST' action = 'process_name.php' class = 'form'>
                    <div>
                        <label for = 'namePlayer'>Can you please tell us your name?</label>
                        <input type = 'text' id = 'namePlayer' name = 'namePlayer'>
                        <button type = 'submit' name='submitName'>Let's go!</button>
                    </div>
                </form><?php
            }
        } 
        // Display results
        if (isset($resultsOptions)) {
            if (($playerChoice !== "") and ($playerChoice != "playerErr")) {?>
                <h2>Results</h2> 
                <p>You chose <span class="options"><?php echo $playerChoice?></span> || Computer chose <span class="options"><?php echo $computerChoice?></span>.</p><?php
                // Decide the winner
                if ($winner == "computer") {?>
                    <p class="results">Sorry, computer wins...</p>
                    <i class="fas fa-sad-tear"></i><hr><?php
                } elseif ($winner == "player") {?>
                    <p class="results"> Congrats! You wins!</p>
                    <i class="fas fa-laugh-wink" ></i><hr><?php
                } elseif ($winner == "tie") {?>
                    <p class="results">Ties!</p>
                    <i class="fas fa-meh"></i><hr><?php
                }?>
                <h2>Play again?</h2>
                <p>Please click to choose your option!</p>
                <form action="process_option.php" method="POST">
                    <div class="optionArea">
                    <input class= "option" type="radio" name="playerChoice" value="rock" id="rock" <?php echo (isset($playerChoice) and $playerChoice=="rock") ? "checked" : "" ?>>
                    <label class="<?php echo($playerChoice=="rock") ? "img_checked" : ""?> image rockimg" for ="rock" >Rock</label>

                    <input class= "option" type="radio" name="playerChoice" value="paper" id="papper" <?php echo (isset($playerChoice) and $playerChoice=="paper") ? "checked" : "" ?>>
                    <label class="<?php echo($playerChoice=="paper") ? "img_checked" : ""?> image paperimg" for ="papper">Paper</label>

                    <input class= "option" type="radio" name="playerChoice" value="scissors" id="scissors" <?php echo (isset($playerChoice) and $playerChoice=="scissors") ? "checked" : "" ?>>
                    <label class="<?php echo($playerChoice=="scissors") ? "img_checked" : ""?> image scissorsimg" for ="scissors">Scissors</label>
                    </div>
                    <button type="submit" name="submitGame" >Roshambo</button>
                </form>
                <input class="restart begin" type="button" onclick = "location.href='index.php';" value = "Restart?"><?php
            } else {?> 
                <p>You must select one option below!</p>
                <form action="process_option.php" method="POST">
                    <div class="optionArea">
                    <input class= "option" type="radio" name="playerChoice" value="rock" id="rock" <?php echo (isset($playerChoice) and $playerChoice=="rock") ? "checked" : "" ?>>
                    <label class="<?php echo($playerChoice=="rock") ? "img_checked" : ""?> image rockimg" for ="rock" >Rock</label>

                    <input class= "option" type="radio" name="playerChoice" value="paper" id="papper" <?php echo (isset($playerChoice) and $playerChoice=="paper") ? "checked" : "" ?>>
                    <label class="<?php echo($playerChoice=="paper") ? "img_checked" : ""?> image paperimg" for ="papper">Paper</label>

                    <input class= "option" type="radio" name="playerChoice" value="scissors" id="scissors" <?php echo (isset($playerChoice) and $playerChoice=="scissors") ? "checked" : "" ?>>
                    <label class="<?php echo($playerChoice=="scissors") ? "img_checked" : ""?> image scissorsimg" for ="scissors">Scissors</label>
                    </div>
                    <button type="submit" name="submitGame" >Roshambo</button>
                </form>
                <input class="restart back" type="button" onclick = "location.href='index.php';" value = "Go back?"><?php
            } 
        }?>
    </section>
</body>
</html>
