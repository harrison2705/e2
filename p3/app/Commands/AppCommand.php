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
            $this->app->db()->insert('results', [
                'playerChoice' => ['rock','paper', 'scissors'][rand(0,2)],
                'computerChoice' => ['rock','paper', 'scissors'][rand(0,2)],
                'winner' => ['player', 'computer'][rand(0,1)],
                'dateSaved' => $faker -> dateTimeBetween('-'.$i.' days', 'now')->format('Y-m-d H:i:s')
            ]);
        }
    }
}
