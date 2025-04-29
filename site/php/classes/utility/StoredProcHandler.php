<?php
namespace site\php\classes\utility; 

require_once __DIR__.'/ProcResult.php';
require_once __DIR__.'/DatabaseHandler.php';

class StoredProcHandler extends DatabaseHandler
{
    public function Add($procedureName, $inputParams): ProcResult
    {
        return $this->ExecuteProcedure($procedureName, $inputParams);
    }

    public function Update($procedureName, $inputParams): ProcResult
    {
        return $this->ExecuteProcedure($procedureName, $inputParams);
    }

    public function Delete($procedureName, $inputParams): ProcResult
    {
        return $this->ExecuteProcedure($procedureName, $inputParams);
    }

    public function Select($procedureName, $inputParams)
    {
        return $this->ExecuteProcedure($procedureName, $inputParams);
    }

    public function SelectAll($procedureName, $inputParams)
    {
        return $this->ExecuteProcedure($procedureName, $inputParams);
    }
}