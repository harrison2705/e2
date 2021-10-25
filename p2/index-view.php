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
            echo display_name();
        }
        //Form to display options -->
        if(isset($resultsName)) {
            if ($namePlayer == $resultsName['namePlayer']){?>
                <p>Hello <?php echo $namePlayer?>!</p>
                <p> Rock, Paper or Scissors? What is your choice?</p>
                <?php echo display_option();?>
                <input class="restart" type="button" onclick = "location.href='index.php';" value = "Go back?"><?php
            } else { ?>
                <p><?php echo $namePlayer?></p><?php
                echo display_name();
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
                <?php echo display_option();?>
                <input class="restart begin" type="button" onclick = "location.href='index.php';" value = "Restart?"><?php
            } else {?> 
                <p>You must select one option below!</p>
                <?php echo display_option();?>
                <input class="restart back" type="button" onclick = "location.href='index.php';" value = "Go back?"><?php
            } 
        }?>
    </section>
</body>
</html>
