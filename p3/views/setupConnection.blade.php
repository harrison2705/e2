# Set up all the variables we need to make a connection
@php
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
@endphp