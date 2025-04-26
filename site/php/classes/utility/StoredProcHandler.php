<?php
namespace CFOOTMAD\Utility; 

class StoredProcHandler extends DatabaseHandler
{
    public function Add($procedureName, $inputParams): ProcResult
    {
        return $this->ExecuteProcedure($procedureName, $inputParams);
    }

    public function Update($procedureName, $inputParams, $outputParams = [])
    {
        return $this->ExecuteProcedure($procedureName, $inputParams);
    }

    public function Delete($procedureName, $inputParams, $outputParams = [])
    {
        return $this->ExecuteProcedure($procedureName, $inputParams);
    }

    public function Select($procedureName, $inputParams, $outputParams = [])
    {
        return $this->ExecuteProcedure($procedureName, $inputParams);
    }

    public function SelectAll($procedureName, $inputParams, $outputParams = [])
    {
        return $this->ExecuteProcedure($procedureName, $inputParams);
    }
}