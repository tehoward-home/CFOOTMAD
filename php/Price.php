<?php

require_once 'DatabaseConnection.php';
require_once 'Result.php';

class Price {
    // Fields
    private $priceId;
    private $slidingLow;
    private $slidingHigh;
    private $isSlidingScale;
    private $nonMember;
    private $member;
    private $student;
    private $freeAge;
    private $memberList;
    private $name;
    private $createdDate;
    private $createdById;
    private $modifiedById;
    private $modifiedDate;
    private $database;
    private $status;
    private $returnMessage;
    private $result;

    public function __construct($slidingLow = null, $slidingHigh = null, $isSlidingScale = null, $nonMember = null, $member = null, $student = null, $freeAge = null, $memberList = null, $name = null, $createdById = null) {
        $this->priceId = null;
        $this->slidingLow = $slidingLow;
        $this->slidingHigh = $slidingHigh;
        $this->isSlidingScale = $isSlidingScale;
        $this->nonMember = $nonMember;
        $this->member = $member;
        $this->student = $student;
        $this->freeAge = $freeAge;
        $this->memberList = $memberList;
        $this->name = $name;
        $this->createdDate = null;
        $this->createdById = $createdById;
        $this->modifiedById = null;
        $this->modifiedDate = null;
        $this->database = new DatabaseConnection();
        $this->database->connect();
        $this->status = false;
        $this->returnMessage = "";
        $this->result = new Result();
    }

    // Getters and Setters
    public function getPriceId() {
        return $this->priceId;
    }

    public function setPriceId($priceId) {
        $this->priceId = $priceId;
    }

    public function getSlidingLow() {
        return $this->slidingLow;
    }

    public function setSlidingLow($slidingLow) {
        $this->slidingLow = $slidingLow;
    }

    public function getSlidingHigh() {
        return $this->slidingHigh;
    }

    public function setSlidingHigh($slidingHigh) {
        $this->slidingHigh = $slidingHigh;
    }

    public function getIsSlidingScale() {
        return $this->isSlidingScale;
    }

    public function setIsSlidingScale($isSlidingScale) {
        $this->isSlidingScale = $isSlidingScale;
    }

    public function getNonMember() {
        return $this->nonMember;
    }

    public function setNonMember($nonMember) {
        $this->nonMember = $nonMember;
    }

    public function getMember() {
        return $this->member;
    }

    public function setMember($member) {
        $this->member = $member;
    }

    public function getStudent() {
        return $this->student;
    }

    public function setStudent($student) {
        $this->student = $student;
    }

    public function getFreeAge() {
        return $this->freeAge;
    }

    public function setFreeAge($freeAge) {
        $this->freeAge = $freeAge;
    }

    public function getMemberList() {
        return $this->memberList;
    }

    public function setMemberList($memberList) {
        $this->memberList = $memberList;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }

    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;
    }

    public function getCreatedById() {
        return $this->createdById;
    }

    public function setCreatedById($createdById) {
        $this->createdById = $createdById;
    }

    public function getModifiedById() {
        return $this->modifiedById;
    }

    public function setModifiedById($modifiedById) {
        $this->modifiedById = $modifiedById;
    }

    public function getModifiedDate() {
        return $this->modifiedDate;
    }

    public function setModifiedDate($modifiedDate) {
        $this->modifiedDate = $modifiedDate;
    }

    public function Result() {
        return $this->result;
    }

    public function Connection() {
        return $this->database->Connection();
    }

    // CRUD Operations
    public function addPrice() {
        try {
            // Prepare the stored procedure call
            $sql = "CALL spAddPrice(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->database->Connection()->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':priceId', $this->priceId , PDO::PARAM_INT );
            $stmt->bindParam(':slidingLow', $this->slidingLow);
            $stmt->bindParam(':slidingHigh', $this->slidingHigh);
            $stmt->bindParam(':isSlidingScale', $this->isSlidingScale, PDO::PARAM_BOOL);
            $stmt->bindParam(':nonMember', $this->nonMember);
            $stmt->bindParam(':member', $this->member);
            $stmt->bindParam(':student', $this->student);
            $stmt->bindParam(':freeAge', $this->freeAge, PDO::PARAM_INT);
            $stmt->bindParam(':memberList', $this->memberList);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':createdById', $this->createdById, PDO::PARAM_INT);
            $stmt->bindParam(':status', $this->status, PDO::PARAM_BOOL | PDO::PARAM_INPUT_OUTPUT, 4000);
            $stmt->bindParam(':returnMessage', $this->returnMessage, PDO::PARAM_STR | PDO::PARAM_INPUT_OUTPUT, 4000);
            $stmt->execute();
            
            $this->Result()->Status = true;
            $this->Result()->ReturnMessage = "Price added successfully.";
        } catch (PDOException $e) {
            $this->Result()->Status = false;
            $this->Result()->ReturnMessage = "Error adding price: " . $e->getMessage();
        }
    }

    public function updatePrice() {
        try {
  
            // Prepare the stored procedure call
            $sql = "CALL spUpdatePrice(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->database->Connection()->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':slidingLow', $this->slidingLow);
            $stmt->bindParam(':slidingHigh', $this->slidingHigh);
            $stmt->bindParam(':isSlidingScale', $this->isSlidingScale, PDO::PARAM_BOOL);
            $stmt->bindParam(':nonMember', $this->nonMember);
            $stmt->bindParam(':member', $this->member);
            $stmt->bindParam(':student', $this->student);
            $stmt->bindParam(':freeAge', $this->freeAge, PDO::PARAM_INT);
            $stmt->bindParam(':memberList', $this->memberList);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':createdById', $this->createdById, PDO::PARAM_INT);
            $stmt->bindParam(':status', $this->status, PDO::PARAM_BOOL | PDO::PARAM_INPUT_OUTPUT, 4000);
            $stmt->bindParam(':returnMessage', $this->returnMessage, PDO::PARAM_STR | PDO::PARAM_INPUT_OUTPUT, 4000);
            $stmt->execute();
            
            $this->Result()->Status = true;
            $this->Result()->ReturnMessage = "Price updated successfully.";
        } catch (PDOException $e) {
            $this->Result()->Status = false;
            $this->Result()->ReturnMessage = "Error updated price: " . $e->getMessage();
        }
    }

    public static function deletePrice($pdo, $priceId) {
        try {
            $stmt = $pdo->prepare("DELETE FROM Price WHERE PriceId = :priceId");
            $stmt->execute([':priceId' => $priceId]);
            return "Price deleted successfully.";
        } catch (PDOException $e) {
            return "Error deleting price: " . $e->getMessage();
        }
    }

    public static function getAllPrices($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM Price");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error retrieving prices: " . $e->getMessage();
        }
    }

    public static function getPriceById($pdo, $priceId) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM Price WHERE PriceId = :priceId");
            $stmt->execute([':priceId' => $priceId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error retrieving price: " . $e->getMessage();
        }
    }
}
?>