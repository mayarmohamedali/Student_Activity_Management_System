<?php
require_once __DIR__ . '/Model.php';

class Student {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function createStudent($userId, $studentName, $gender) {
        $query = "INSERT INTO students (UserId, StudentName, Gender) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iss", $userId, $studentName, $gender);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}

