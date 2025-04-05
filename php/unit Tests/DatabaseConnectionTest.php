use PHPUnit\Framework\TestCase;

<?php


require_once 'DatabaseConnection.php';

class DatabaseConnectionTest extends TestCase
{
    private $dbConnection;

    protected function setUp(): void
    {
        $this->dbConnection = new DatabaseConnection();
    }

    public function testConnectionSuccess()
    {
        // Mock environment variables for successful connection
        putenv('DB_HOST=localhost');
        putenv('DB_NAME=test_database');
        putenv('DB_USER=test_user');
        putenv('DB_PASS=test_password');

        $this->dbConnection->connect();
        $result = $this->dbConnection->Connection();

        $this->assertNotNull($result, 'Connection should not be null on success.');
        $this->assertTrue($this->dbConnection->result->Status, 'Status should be true on successful connection.');
        $this->assertEquals('Connection successful.', $this->dbConnection->result->ReturnMessage);
    }

    public function testConnectionFailure()
    {
        // Mock environment variables for failed connection
        putenv('DB_HOST=invalid_host');
        putenv('DB_NAME=invalid_database');
        putenv('DB_USER=invalid_user');
        putenv('DB_PASS=invalid_password');

        $this->dbConnection->connect();

        $this->assertFalse($this->dbConnection->result->Status, 'Status should be false on failed connection.');
        $this->assertNotEmpty($this->dbConnection->result->ReturnMessage, 'ReturnMessage should contain error details on failure.');
    }
}