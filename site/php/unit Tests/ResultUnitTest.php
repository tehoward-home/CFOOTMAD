<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use CFOOTMAD\Utility\Result;

class ResultTest extends TestCase
{
    private $result;

    protected function setUp(): void
    {
        // Initialize a new Result object before each test
        $this->result = new Result();
    }

    public function testDefaultValues()
    {
        // Test default values of the Result object
        $this->assertFalse($this->result->getStatus(), "Default status should be false.");
        $this->assertEquals("", $this->result->getReturnMessage(), "Default return message should be an empty string.");
    }

    public function testSetAndGetStatus()
    {
        // Test setting and getting the status
        $this->result->setStatus(true);
        $this->assertTrue($this->result->getStatus(), "Status should be true after setting it to true.");

        $this->result->setStatus(false);
        $this->assertFalse($this->result->getStatus(), "Status should be false after setting it to false.");
    }

    public function testSetAndGetReturnMessage()
    {
        // Test setting and getting the return message
        $message = "Test message";
        $this->result->setReturnMessage($message);
        $this->assertEquals($message, $this->result->getReturnMessage(), "Return message should match the set value.");
    }
}