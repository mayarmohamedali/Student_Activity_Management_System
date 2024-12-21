<?php

class RegistrationModel {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function registerUser($user_id, $event_id, $name, $email, $slot, $role) {
        try {
            // Use prepared statements to prevent SQL injection
            $query = "INSERT INTO registrations (UserId, EventId, Name, Email, Slot, Role) 
                      VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("iissss", $user_id, $event_id, $name, $email, $slot, $role);

            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error: Could not execute query.");
            }
        } catch (Exception $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }
}
?>
