<?php

class EventModel
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function createEvent($EventName, $ClubName, $EventDescription, $EventImage, $EventDate, $EventTimeSlot, $EventLocation)
    {
        $query = "INSERT INTO events (EventName, ClubName, EventDescription, EventImage, EventDate, EventTimeSlot, EventLocation, is_approved) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')";

        // Prepare the query and bind parameters
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("sssssss", $EventName, $ClubName, $EventDescription, $EventImage, $EventDate, $EventTimeSlot, $EventLocation);

        // Execute the query
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    public function getApprovedEvents()
    {
        $query = "SELECT * FROM events WHERE is_approved = ?";
        $stmt = $this->conn->prepare($query);
        $approved = 'approved';
        $stmt->bind_param('s', $approved);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Fetch all events with 'pending' status
    public function getPendingEvents()
    {
        $query = "SELECT * FROM events WHERE is_approved = 'pending'";
        $result = $this->conn->query($query);
    
        if (!$result) {
            die("Database query failed: " . $this->conn->error);
        }
    
        return $result;
    }
    
    // Update event approval status
    public function updateEventApproval($eventId, $status)
    {
        $query = "UPDATE events SET is_approved = ? WHERE EventId = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $status, $eventId);
        return $stmt->execute();
    }

    // Delete event
    public function deleteEvent($eventId)
    {
        $query = "DELETE FROM events WHERE EventId = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $eventId);
        return $stmt->execute();
    }
}


?>
