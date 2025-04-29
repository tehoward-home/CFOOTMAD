<?php
namespace site\php\classes\utility;
require_once __DIR__.'/ProcResult.php';
require_once __DIR__.'/DatabaseConnection.php';
require_once __DIR__.'/Result.php';
use PDO;
use PDOException;

abstract class DatabaseHandler
{
    protected $dbConnection;
    protected $procResult;

    public function __construct()
    {
        $this->dbConnection = new DatabaseConnection();
        $this->procResult = new ProcResult();
    }
    
    public function ExecuteProcedure($procedureName, $inputParams): ProcResult
    {
        $outputParameters = ['Status', 'ReturnMessage'];

        try {
            $this->procResult = new ProcResult();
            $this->dbConnection->connect();

            // Prepare the placeholders for input and output parameters
            $paramPlaceholders = [];
            if (!empty($inputParams)) {
                $paramPlaceholders = array_fill(0, count($inputParams), '?');
            }
            foreach ($outputParameters as $outputParam) {
                $paramPlaceholders[] = "@$outputParam";
            }

            $query = "CALL $procedureName(" . implode(', ', $paramPlaceholders) . ")";
            $stmt = $this->dbConnection->prepare($query);

            // Bind input parameters if any
            if (!empty($inputParams)) {
                foreach (array_values($inputParams) as $index => $value) {
                    $stmt->bindValue($index + 1, $value);
                }
            }

            // Execute the stored procedure
            $stmt->execute();

            // Fetch any result data
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->procResult->SetData($data);

            // Fetch output parameters
            $outputQuery = "SELECT " . implode(', ', array_map(fn($param) => "@$param AS $param", $outputParameters));
            $pdo = $this->dbConnection->Connection();
            $stmt->closeCursor();

            $outputStmt = $pdo->query($outputQuery);
            // $outputStmt = $this->dbConnection->query($outputQuery);
            $output = $outputStmt->fetch(PDO::FETCH_ASSOC);

            // Set output parameters in ProcResult
            foreach ($outputParameters as $outputParam) {
                $setterMethod = 'Set' . $outputParam;
                if (method_exists($this->procResult, $setterMethod)) {
                    $this->procResult->$setterMethod($output[$outputParam]);
                }
            }

            $this->dbConnection->disconnect();
            return $this->procResult;

        } catch (PDOException $e) {
            $this->procResult->SetResult(false);
            $this->procResult->SetReturnMessage($e->getMessage());
            $this->dbConnection->disconnect();
            return $this->procResult;
        }
    }

    abstract public function Add($procedureName, $inputParams): ProcResult;

    abstract public function Update($procedureName, $inputParams): ProcResult;

    abstract public function Delete($procedureName, $inputParams): ProcResult;

    abstract public function Select($procedureName, $inputParams);

    abstract public function SelectAll($procedureName, $inputParams);
}