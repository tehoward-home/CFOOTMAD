<?php

// ----------------------------------------------------------------------
// Database connection, retrieves connection values from environment
//
// Usage example
// $db = new DatabaseConnection();
namespace site\php\classes\utility; 

require_once __DIR__.'/ProcResult.php';
require_once __DIR__.'/Result.php';

//USE site\php\classes\utility\Result;
//USE site\php\classes\utility\ProcResult;
USE PDO;
USE PDOException; 


class DatabaseConnection {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $connection;
    private $result;

    public function __construct()
    {
        $this->host = getenv('DB_HOST') ?: 'localhost';
        $this->dbname = getenv('DB_NAME') ?: 'CFOOTMAD';
        $this->username = getenv('DB_USER') ?: 'tom';
        $this->password = getenv('DB_PASS') ?: 'Babybuttcrack#100';
        $this->result = new Result();
    }

    public function Connection(): PDO {
        return $this->connection;
    }

    public function Result(): Result {
        return $this->result;
    }  
    
    public function Prepare($prepareStatement){
        return $this->connection->prepare($prepareStatement);
    }  

    public function connect(): void
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->result->setReturnMessage('Connection successful.');
            $this->result->setStatus(true);
        } catch (PDOException $e) {
            $this->result->setReturnMessage($e->getMessage());
            $this->result->setStatus(false);
        }
    }

    public function disconnect(): void
    {
        $this->connection = null;
        $this->result->setReturnMessage('Disconnected successfully.');
        $this->result->setStatus(true);
    }
}

