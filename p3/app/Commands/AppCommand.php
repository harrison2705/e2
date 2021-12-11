<?php

namespace App\Commands;
use Faker\Factory;

class AppCommand extends Command
{   
    public function fresh(){
        $this->migrate();
        $this->seed();
    }
    public function migrate() {
        $this->app->db()->createTable('results', [
            'playerChoice' => 'varchar(255)',
            'computerChoice' => 'varchar(255)',
            'winner' => 'varchar(255)',
            'dateSaved' => 'timestamp',
        ]);
    }
    public function seed() {
        $faker = Factory::create();
        
        for($i=5; $i>0; $i--) {
            $playerChoice = ['rock','paper', 'scissors'][rand(0, 2)];
            $computerChoice = ['rock','paper', 'scissors'][rand(0, 2)];
            if ($playerChoice == $computerChoice) {
                $winner= 'tie';
            } elseif ($computerChoice == "rock") {
                $winner= $playerChoice == "scissors" ? 'computer' : 'player';
            } elseif ($computerChoice == "paper") {
                $winner = $playerChoice == "rock" ? 'computer' : 'player';
            } elseif ($computerChoice == "scissors") {
                $winner = $playerChoice == "paper" ? 'computer' : 'player';
            }
            $this->app->db()->insert('results', [
                'playerChoice' => $playerChoice,
                'computerChoice' => $computerChoice,
                'winner' => $winner,
                'dateSaved' => $faker -> dateTimeBetween('-'.$i.' days', 'now')->format('Y-m-d H:i:s')
            ]);
        }
    }
}
