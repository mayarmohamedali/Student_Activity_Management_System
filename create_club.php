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

class ClubAndOrganization {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function isClubAndOrganizationExists($username, $email) {
        $query = "SELECT * FROM Users WHERE Username = ? OR Email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $exists = $result->num_rows > 0;
        $stmt->close();
        return $exists;
    }

    public function createClubAndOrganization($username, $email, $password, $userTypeId) {
        $query = "INSERT INTO Users (Username, Email, Password, UserTypeId) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $username, $email, $password, $userTypeId);
        $success = $stmt->execute();
        $userId = $stmt->insert_id;
        $stmt->close();
        return $success ? $userId : false;
    }

    public function createClubDetails($userId, $name, $description) {
        $query = "INSERT INTO Clubsandorganizations (UserId, ClubAndOrganizationName, ClubAndOrganizationDescription) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iss", $userId, $name, $description);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}

class ClubAndOrganizationController {
    private $clubAndOrganization;

    public function __construct($dbConnection) {
        $this->clubAndOrganization = new ClubAndOrganization($dbConnection);
    }

    public function handleClubAndOrganizationCreation($postData) {
        $username = $postData["username"];
        $email = $postData["email"];
        $password = password_hash($postData["password"], PASSWORD_BCRYPT);
        $userTypeId = $postData["userTypeId"];

        $clubAndOrganizationName = $postData["ClubAndOrganizationName"] ?? null;
        $clubAndOrganizationDescription = $postData["ClubAndOrganizationDescription"] ?? null;

        if ($this->clubAndOrganization->isClubAndOrganizationExists($username, $email)) {
            echo "<script>
                    alert('Username or Email already exists. Please use a different one.');
                    window.history.back();
                  </script>";
            return;
        }

        $userId = $this->clubAndOrganization->createClubAndOrganization($username, $email, $password, $userTypeId);
        if (!$userId) {
            echo "<script>
                    alert('Error: Could not create club/organization.');
                    window.history.back();
                  </script>";
            return;
        }

        if ($userTypeId == 2 && $clubAndOrganizationName && $clubAndOrganizationDescription) {
            if ($this->clubAndOrganization->createClubDetails($userId, $clubAndOrganizationName, $clubAndOrganizationDescription)) {
                echo "<script>
                        alert('Club created successfully!');
                        window.location.href = 'indexForAdmin.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Error: Could not create club/organization record.');
                        window.history.back();
                      </script>";
            }
        } else {
            echo "<script>
                    alert('User created successfully!');
                    window.location.href = 'indexForAdmin.php';
                  </script>";
        }
    }
}

// Main Script
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dbConnection = new DatabaseConnection();
    $controller = new ClubAndOrganizationController($dbConnection->getConnection());
    $controller->handleClubAndOrganizationCreation($_POST);
    $dbConnection->closeConnection();
}
?>
