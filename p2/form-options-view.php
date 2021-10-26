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