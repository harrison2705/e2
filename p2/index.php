<?php
//error_reporting( error_reporting() & ~E_NOTICE );
session_start();
$havePlayerInfo = false;
$namePlayer = $playerChoice = "";

//Get the name of the player
if (!is_null($_SESSION['resultsName'])) {
    $resultsName = $_SESSION['resultsName'];
    if (empty($resultsName['namePlayer'])) {
       //check if the player input their name
        $namePlayer = "Hi there, you have not input your name yet!";
    } else {
        $namePlayer = $resultsName['namePlayer'];
        //check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $namePlayer)) {
            $namePlayer  = "Sorry, only letters and white space are allowed!";
        }
    }
    $_SESSION['resultsName'] = null; 
    $havePlayerInfo = true;
//Get the option that the player chose
} elseif (!is_null($_SESSION['resultsOptions'])) { 
    $havePlayerInfo = true;
    $resultsOptions= $_SESSION['resultsOptions'];
    $options = ["rock", "paper", "scissors"];
    $computerChoice = $options[array_rand($options, 1)];
    if (empty($resultsOptions['playerChoice'])) {
        // Check if the player does not select an option
        $playerChoice = "playerErr";
    } else {
        $playerChoice= $resultsOptions['playerChoice'];
        // Compare player and computer's options
        if ($playerChoice == $computerChoice) {
            $winner= 'tie';
        } elseif ($computerChoice == "rock") {
            $winner= $playerChoice == "scissors" ? 'computer' : 'player';
        } elseif ($computerChoice == "paper") {
            $winner = $playerChoice == "rock" ? 'computer' : 'player';
        } elseif ($computerChoice == "scissors") {
            $winner = $playerChoice == "paper" ? 'computer' : 'player';
        }
    }
    $_SESSION['resultsOptions'] = null;
}
        //Function to display name forms
        function display_name() {?>
            <form method = 'POST' action = 'process_name.php' class = 'form'>
                <div>
                    <label for = 'namePlayer'>Can you please tell us your name?</label>
                    <input type = 'text' id = 'namePlayer' name = 'namePlayer'>
                    <button type = 'submit' name='submitName'>Let's go!</button>
                </div>
            </form><?php
        }
        //Function to display option forms
        function display_option() {?>
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
            </form><?php
        }


require 'index-view.php';
