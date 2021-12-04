<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */ 
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
    public function intro()
    {
        return $this->app->view('intro');
    }
    public function show()
    {   
  

         # Set up all the variables we need to make a connection
        $host = $this->app->env('DB_HOST');
        $database = $this->app->env('DB_NAME');
        $username = $this->app->env('DB_USERNAME');
        $password = $this->app->env('DB_PASSWORD');
    
        # DSN (Data Source Name) string
        # contains the information required to connect to the database
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";

        # Driver-specific connection options
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            # Create a PDO instance representing a connection to a database
            $pdo = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        $sqlRoundDetails = 'SELECT * from results';
        $executed = $this->app->db()->run($sqlRoundDetails);
        
        $roundDetails = $executed -> fetchAll();
       
        return $this->app->view('show', [
            'roundDetails' => $roundDetails,

        ]);
    }
    public function roundHistory()
    {   
         # Set up all the variables we need to make a connection
        $host = $this->app->env('DB_HOST');
        $database = $this->app->env('DB_NAME');
        $username = $this->app->env('DB_USERNAME');
        $password = $this->app->env('DB_PASSWORD');
    
        # DSN (Data Source Name) string
        # contains the information required to connect to the database
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";

        # Driver-specific connection options
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            # Create a PDO instance representing a connection to a database
            $pdo = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        $sqldateSaved = 'SELECT id, dateSaved from results';
        $executed = $this->app->db()->run($sqldateSaved);
        
        $rounds = $executed -> fetchAll();

        return $this->app->view('roundHistory', [
            'rounds' => $rounds
        ]);

    }
    public function userName()
    {   
        # Set up all the variables we need to make a connection
        $host = $this->app->env('DB_HOST');
        $database = $this->app->env('DB_NAME');
        $username = $this->app->env('DB_USERNAME');
        $password = $this->app->env('DB_PASSWORD');
    
        # DSN (Data Source Name) string
        # contains the information required to connect to the database
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";

        # Driver-specific connection options
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            # Create a PDO instance representing a connection to a database
            $pdo = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
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
            # Set up all the variables we need to make a connection
            $host = $this->app->env('DB_HOST');
            $database = $this->app->env('DB_NAME');
            $username = $this->app->env('DB_USERNAME');
            $password = $this->app->env('DB_PASSWORD');
    
            # DSN (Data Source Name) string
            # contains the information required to connect to the database
            $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";

            # Driver-specific connection options
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                # Create a PDO instance representing a connection to a database
                $pdo = new \PDO($dsn, $username, $password, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
            $dateSaved = gmdate('Y-m-d h:i:s');
       
            $sqlTemplate = "INSERT INTO results (playerChoice, computerChoice, winner, dateSaved) VALUES (:playerChoice, :computerChoice, :winner, :dateSaved)";
            $values = [
                'playerChoice' => $playerChoice,
                'computerChoice' => $computerChoice,
                'winner' => $winner,
                'dateSaved' =>$dateSaved,
            ];
            $statement = $pdo->prepare($sqlTemplate);
            $statement -> execute($values);
        }
        return $this->app->redirect('/', [
            'playerChoice' => $playerChoice,
            'computerChoice' => $computerChoice,
            'winner' => $winner,
            'haveOptionInfo' => true,
            'havePlayerInfo' => true,
            'dateSaved' => $dateSaved,
        ]);
    }
}
