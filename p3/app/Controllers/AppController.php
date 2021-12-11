<?php
namespace App\Controllers;

class AppController extends Controller
{
    public function index()
    {   
        $nameSaved = $this->app->old('nameSaved');
        $namePlayer = $this->app->old('namePlayer');
        $havePlayerInfo = $this->app->old('havePlayerInfo');
        $playerChoice = $this ->app->old('playerChoice');
        $haveOptionInfo = $this ->app->old('haveOptionInfo');
        $computerChoice = $this ->app->old('computerChoice');
        $winner = $this ->app->old('winner');
        return $this->app->view('index', [
            'nameSaved' => $nameSaved,
            'namePlayer' => $namePlayer,
            'havePlayerInfo' => $havePlayerInfo,
            'playerChoice' => $playerChoice,
            'haveOptionInfo' =>$haveOptionInfo,
            'computerChoice' => $computerChoice,
            'winner' => $winner,
        ]);
    }
    public function results()
    {  
        return $this->app->view('results');
    }
    public function form()
    {
        return $this->app->view('form');
    }
    public function setupConnection()
    {
        return $this->app->view('setupConnection');
    }
    public function intro()
    {
        return $this->app->view('intro');
    }
    public function show()
    {   
        @include('setupConnection');
        $param = $this->app->param('dateSaved');
        $sqlRoundDetails = 'SELECT * from results';
        $executed = $this->app->db()->run($sqlRoundDetails);
        $roundDetails = $executed -> fetchAll();
       
        return $this->app->view('show', [
            'roundDetails' => $roundDetails,
            'param' => $param
        ]);
    }
    public function roundHistory()
    {   
        $sqldateSaved = 'SELECT id, dateSaved from results';
        $executed = $this->app->db()->run($sqldateSaved);
        $rounds = $executed -> fetchAll();
        
        #number of rounds
        $sqlRoundCount = 'SELECT COUNT(id) from results';
        $executedRoundCount = $this->app->db()->run($sqlRoundCount);
        $roundCounts = $executedRoundCount->fetchAll();
        
        #number of rounds that Player won
        $sqlPlayerWinCount = 'SELECT COUNT(winner) from results where winner="player"';
        $executedPlayerWinCount = $this->app->db()->run($sqlPlayerWinCount);
        $playerWinCounts = $executedPlayerWinCount->fetchAll();
        
        #number of rounds that Computer won
        $sqlComputerWinCount = 'SELECT COUNT(winner) from results where winner="computer"';
        $executedComputerWinCount = $this->app->db()->run($sqlComputerWinCount);
        $computerWinCounts = $executedComputerWinCount->fetchAll();

        return $this->app->view('roundHistory', [
            'rounds' => $rounds,
            'roundCounts' => $roundCounts,
            'playerWinCounts' => $playerWinCounts,
            'computerWinCounts' => $computerWinCounts
        ]);

    }
    public function userName()
    {   
        $namePlayer = $this->app->input('namePlayer'); 

        $this->app->validate([
            'namePlayer' => 'required',
            'namePlayer' => 'alpha',
        ]);
        return $this->app->redirect('/',[
            'nameSaved' => true,
            'namePlayer' => $namePlayer,
            'havePlayerInfo' => true,
            'haveOptionInfo' => false
        ]);
    }
    public function optionResults() {
        $options = ["rock", "paper", "scissors"];
        $computerChoice = $options[array_rand($options, 1)];
        $playerChoice = $this->app->input('playerChoice');

        if (empty($playerChoice)) {
            $playerChoice = "playerErr";
        } else {
            if ($playerChoice == $computerChoice) {
                $winner= 'tie';
            } elseif ($computerChoice == "rock") {
                $winner= $playerChoice == "scissors" ? 'computer' : 'player';
            } elseif ($computerChoice == "paper") {
                $winner = $playerChoice == "rock" ? 'computer' : 'player';
            } elseif ($computerChoice == "scissors") {
                $winner = $playerChoice == "paper" ? 'computer' : 'player';
            }
            
            $dateSaved = date('Y-m-d h:i:s');
            $this->app->db()->insert('results', [
                'playerChoice' => $playerChoice,
                'computerChoice' => $computerChoice,
                'winner' => $winner,
                'dateSaved' => $dateSaved,
            ]);


        }
        return $this->app->redirect('/', [
            'playerChoice' => $playerChoice,
            'computerChoice' => $computerChoice,
            'winner' => $winner,
            'haveOptionInfo' => true,
            'havePlayerInfo' => true,
            'dateSaved' => $dateSaved
        ]);
    }
}
