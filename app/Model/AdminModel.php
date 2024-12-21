<?php

class AdminModel extends Model {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function isUserExists($username, $email) {
        $query = "SELECT * FROM Users WHERE Username = ? OR Email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $exists = $result->num_rows > 0;
        $stmt->close();
        return $exists;
    }

    public function createUser($username, $email, $password, $userTypeId) {
        $query = "INSERT INTO Users (Username, Email, Password, UserTypeId) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $username, $email, $password, $userTypeId);
        $stmt->execute();
        $userId = $stmt->insert_id;
        $stmt->close();
        return $userId;
    }

    public function createStudent($userId, $studentName, $gender) {
        $query = "INSERT INTO Students (UserId, StudentName, Gender) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iss", $userId, $studentName, $gender);
        $stmt->execute();
        $success = $stmt->affected_rows > 0;
        $stmt->close();
        return $success;
    }
}
?>
