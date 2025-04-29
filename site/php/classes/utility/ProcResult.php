<?php

namespace site\php\classes\utility;  

class ProcResult
{
    private  $result;
    private $data;
    

    public function __construct()
    {
        $this->result = new Result();
        $this->data = [];
    }

    public function GetResult()
    {
        return $this->result;
    }

    public function SetResult($result)
    {
        $this->result = $result;
    }
    public function GetReturnMessage()
    {
        return $this->result->getReturnMessage();
    }
    public function SetReturnMessage($returnMessage)
    {
        $this->result->setReturnMessage($returnMessage);
    }
    public function GetStatus()
    {
        return $this->result->getStatus();
    }
    public function SetStatus($status)
    {
        $this->result->setStatus($status);
    }

    public function GetData()
    {
        return $this->data;
    }

    public function SetData($data)
    {
        $this->data = $data;
    }
 
    public function ClearData()
    {
        $this->data = [];
    }

    public function clearResult()
    {
        $this->result = new Result();
    }
}

