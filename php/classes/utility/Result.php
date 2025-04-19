<?php
namespace CFOOTMAD\Utility;

class Result {
    private $status; 
    private $returnMessage;

    public function __construct() {
        $this->status = false;
        $this->returnMessage = "";
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getReturnMessage() {
        return $this->returnMessage;
    }

    public function setReturnMessage($returnMessage) {
        $this->returnMessage = $returnMessage;
    }
}