<?php

class DatabaseConnection {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        include 'databaseConnection.php';
        $this->conn = $conn; // Assuming $conn is created in databaseConnection.php
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

class User {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function createUser($username, $email, $password, $userTypeId) {
        $query = "INSERT INTO Users (Username, Email, Password, UserTypeId) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $username, $email, $password, $userTypeId);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}

class UserController {
    private $user;

    public function __construct($dbConnection) {
        $this->user = new User($dbConnection);
    }

    public function handleUserCreation($postData) {
        $username = $postData["username"];
        $email = $postData["email"];
        $password = password_hash($postData["password"], PASSWORD_BCRYPT);
        $userTypeId = $postData["userTypeId"];

        if ($this->user->createUser($username, $email, $password, $userTypeId)) {
            echo "User created successfully!";
        } else {
            echo "Error: Could not create user.";
        }
    }
}

// Main Script
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dbConnection = new DatabaseConnection();
    $controller = new UserController($dbConnection->getConnection());
    $controller->handleUserCreation($_POST);
    $dbConnection->closeConnection();
}
?>
