<?php
include 'databaseConnection.php';

// Fetch all events with status 'pending'
$query = "SELECT * FROM events WHERE is_approved = 'pending'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-12 mb-4">';
        echo '<div class="custom-block bg-white shadow-lg p-4">';
        
        // Display Event Name
        echo '<h5>' . htmlspecialchars($row['EventName']) . '</h5>';
        
        // Display Event Description
        echo '<p><strong>Description:</strong> ' . htmlspecialchars($row['EventDescription']) . '</p>';
        
        // Display Event Image (if available)
        if (!empty($row['EventImage'])) {
            echo '<img src="' . htmlspecialchars($row['EventImage']) . '" alt="Event Image" class="img-fluid mb-3">';
        }

        // Display Event Date
        echo '<p><strong>Date:</strong> ' . htmlspecialchars($row['EventDate']) . '</p>';

        // Display Event Time Slot
        echo '<p><strong>Time Slot:</strong> ' . htmlspecialchars($row['EventTimeSlot']) . '</p>';
        
        // Display Event Location
        echo '<p><strong>Location:</strong> ' . htmlspecialchars($row['EventLocation']) . '</p>';

        // Display Accept/Reject buttons with hidden event ID
        echo '<form action="" method="POST">';
        echo '<input type="hidden" name="event_id" value="' . htmlspecialchars($row['EventId']) . '">';
        echo '<button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>';
        echo '<button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>';
        echo '</form>';

        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>No events pending approval.</p>';
}

// Handle Accept/Reject action
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action']; // Either "accept" or "reject"
    $event_id = $_POST['event_id']; // Get the event ID from the hidden input

    // Validate action
    if ($action !== 'accept' && $action !== 'reject') {
        die("Invalid action.");
    }

    if ($action === 'accept') {
        // Approve the event
        $query = "UPDATE events SET is_approved = 'approved' WHERE EventId = ?";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die("Error preparing query: " . $conn->error);
        }

        // Bind parameters and execute
        $stmt->bind_param("i", $event_id);
        if ($stmt->execute()) {
            echo "<p>Event approved successfully! It will now appear on the StudentClubRegisteration.php page.</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close(); // Close the prepared statement
    } elseif ($action === 'reject') {
        // Delete the event
        $query = "DELETE FROM events WHERE EventId = ?";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die("Error preparing query: " . $conn->error);
        }

        // Bind parameters and execute
        $stmt->bind_param("i", $event_id);
        if ($stmt->execute()) {
            echo "<p>Event rejected and deleted successfully!</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close(); // Close the prepared statement
    }
}

$conn->close(); // Close the database connection
?>
