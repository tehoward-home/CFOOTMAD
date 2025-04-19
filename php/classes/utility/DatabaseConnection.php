<?php

// ----------------------------------------------------------------------
// Database connection, retrieves connection values from environment
//
// Usage example
// $db = new DatabaseConnection();
namespace CFOOTMAD\Utility;

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
        $this->dbname = getenv('DB_NAME') ?: 'your_database_name';
        $this->username = getenv('DB_USER') ?: 'your_username';
        $this->password = getenv('DB_PASS') ?: 'your_password';
        $this->result = new Result();
    }

    public function Connection() {
        return $this->connection;
    }

    public function Result() {
        return $this->result;
    }  
    
    public function Prepare($prepareStatement){
        return $this->connection->prepare($prepareStatement);
    }  

    public function connect()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->result->ReturnMessage = 'Connection successful.';
            $this->result->Status = true;
        } catch (PDOException $e) {
            $this->result->ReturnMessage = $e->getMessage();
            $this->result->Status = false;
        }
    }

    public function disconnect()
    {
        $this->connection = null;
        $this->result->ReturnMessage = 'Disconnected successfully.';
        $this->result->Status = true;
    }
}

