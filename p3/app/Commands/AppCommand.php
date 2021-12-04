<?php

namespace App\Commands;

class AppCommand extends Command
{
    public function migrate() {
        $this->app->db()->createTable('results', [
            'playerChoice' => 'varchar(255)',
            'computerChoice' => 'varchar(255)',
            'winner' => 'varchar(255)',
            'dateSaved' => 'datetime'
        ]);
    }
}
