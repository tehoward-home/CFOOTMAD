<?php

namespace CFOOTMAD\Utility;

use CFOOTMAD\Utility\DatabaseConnection;
use CFOOTMAD\Utility\ProcResult;
use PDO;    
use PDOException;

abstract class DatabaseHandler 
{
    private $dbConnection;
    private $procResult;

    public function __construct()
    {
       $this->dbConnection = new DatabaseConnection();
    }

    // Abstract methods for CRUD operations
    abstract protected function Add($procedureName, $inputParams,);
    abstract protected function Update($procedureName, $inputParams);
    abstract protected function Delete($procedureName, $inputParams);
    abstract protected function select($procedureName, $inputParams);

    // Helper method to execute stored procedures
    protected function executeProcedure($procedureName, $inputParams): ProcResult
    {
        try {
            $this->procResult = new ProcResult();
            $this->dbConnection->connect();
            $paramPlaceholders = implode(', ', array_fill(0, count($inputParams), '?'));
            $stmt = $this->dbConnection->prepare("CALL $procedureName($paramPlaceholders)");

            // Bind input parameters
            foreach ($inputParams as $index => $value) {
                $stmt->bindValue($index + 1, $value);
            }

            // Execute the stored procedure
            $data = $stmt->execute();

            // Fetch output parameters if any
            if (!empty($outputParams)) {
                
                $output = [];
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $output[] = $row;
                }

                $this->procResult->SetResult($this->dbConnection->Result());
                $this->procResult->SetData($data);
                $this->procResult->SetResult($output["Status"]);
                $this->procResult->SetReturnMessage($output["ReturnMessage"]);
                $this->dbConnection->disconnect();
                return $this->procResult;
            } else {
                $this->procResult->SetResult(true);
                $this->procResult->SetData($data);
                $this->procResult->SetReturnMessage("Procedure executed successfully.");
                $this->dbConnection->disconnect();
                return $this->procResult;
            }

        } catch (PDOException $e) {
            $this->procResult->SetResult(false);
            $this->procResult->SetReturnMessage($e->getMessage());
            $this->dbConnection->disconnect();
            return $this->procResult;
            /* die("Error executing procedure: " . $e->getMessage()); */
        }
    }
}