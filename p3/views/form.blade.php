<form action="/optionResults" method="POST" class= 'form'>
    <div class="optionArea">
    <input class= "option" type="radio" name="playerChoice" value="rock" id="rock"{{(isset($playerChoice) and $playerChoice=="rock") ? "checked" : "" }}>
    <label class="{{($playerChoice=="rock") ? "img_checked" : ""}} image rockimg" for ="rock" >Rock</label>
            
    <input class= "option" type="radio" name="playerChoice" value="paper" id="papper" {{(isset($playerChoice) and $playerChoice=="paper") ? "checked" : "" }}>
    <label class="{{($playerChoice=="paper") ? "img_checked" : ""}} image paperimg" for ="papper">Paper</label>

    <input class= "option" type="radio" name="playerChoice" value="scissors" id="scissors" {{(isset($playerChoice) and $playerChoice=="scissors") ? "checked" : "" }}>
    <label class="{{($playerChoice=="scissors") ? "img_checked" : ""}} image scissorsimg" for ="scissors">Scissors</label>
    </div>
    <button type="submit" name="submitGame" >Roshambo</button>
</form>