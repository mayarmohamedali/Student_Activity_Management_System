<?php

// Update the paths to correctly reference the classes
require_once(__DIR__ . "/../db/Dbh.php");  // Include the DB connection
require_once(__DIR__ . "/../Model/EventModel.php");  // Include the EventModel class


// In app/controller/EventControllerForAdmin.php
class EventControllerForAdmin {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function showPendingEvents() {
        $query = "SELECT * FROM events WHERE is_approved = 'pending'";
        return $this->conn->query($query);
    }

    public function handleEventAction($action, $eventId) {
        if ($action === 'accept') {
            // Approve event
            $query = "UPDATE events SET is_approved = 'approved' WHERE EventId = ?";
        } elseif ($action === 'reject') {
            // Delete event
            $query = "DELETE FROM events WHERE EventId = ?";
        } else {
            return false; // Invalid action
        }

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $eventId);

        return $stmt->execute();
    }
}

?>

