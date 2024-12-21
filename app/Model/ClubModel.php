<?php

require_once __DIR__ . '/Model.php';

class ClubModel
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function isUserExists($username, $email)
    {
        $query = "SELECT * FROM Users WHERE Username = ? OR Email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $exists = $result->num_rows > 0;
        $stmt->close();
        return $exists;
    }

    public function createUser($username, $email, $password, $userTypeId)
    {
        $query = "INSERT INTO Users (Username, Email, Password, UserTypeId) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $username, $email, $password, $userTypeId);
        $success = $stmt->execute();
        $userId = $stmt->insert_id;
        $stmt->close();
        return $success ? $userId : false;
    }

    public function createClubDetails($userId, $clubName, $clubDescription)
    {
        $query = "INSERT INTO ClubsAndOrganizations (UserId, ClubAndOrganizationName, ClubAndOrganizationDescription) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iss", $userId, $clubName, $clubDescription);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}
