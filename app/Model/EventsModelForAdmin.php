<?php

require_once(__DIR__ . "/../db/Dbh.php"); // Database connection
class EventsModelForAdmin {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Fetch pending events from the database
    public function getPendingEvents() {
        $query = "SELECT * FROM events WHERE is_approved = 'pending'";
        return $this->conn->query($query);
    }

    // Approve an event
    public function approveEvent($eventId) {
        $query = "UPDATE events SET is_approved = 'approved' WHERE EventId = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $eventId);
        return $stmt->execute();
    }

    // Reject (delete) an event
    public function rejectEvent($eventId) {
        $query = "DELETE FROM events WHERE EventId = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $eventId);
        return $stmt->execute();
    }
}
?>
