<?php 

class EventType
{
    private $eventtypeid;
    private $eventtypename;

    function setEventTypeId($value) : void
    {
        $this->eventtyypeid = $value;
    }
    
    function getEventTypeId(): mixed
    {
        return $this->eventtypeid;
    }

    function setEventTypeName($value) : void
    {
        $this->eventtyypename = $value;
    }
    
    function getEventTypeName(): mixed
    {
        return $this->eventtypename;
    }

    function Save() : void
    {

    }

    function Load() : void
    {
        
    }
}