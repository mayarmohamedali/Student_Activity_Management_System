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

        // Display Accept/Reject buttons
        echo '<form action="" method="POST">';
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

    // Validate action
    if ($action !== 'accept' && $action !== 'reject') {
        die("Invalid action.");
    }

    // Determine the new approval status
    $newStatus = ($action === 'accept') ? 'approved' : 'rejected';

    // Update the event status
    $query = "UPDATE events SET is_approved = ? WHERE EventID = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Error preparing query: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("si", $newStatus, $event_id);

    // Execute the query
    if ($stmt->execute()) {
        echo "Event " . ($newStatus === 'approved' ? "accepted" : "rejected") . " successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the prepared statement
}

$conn->close(); // Close the database connection
?>
