<?php
require_once(__DIR__ . "/../db/Dbh.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = $_POST['event_id'];
    $action = $_POST['action'];

    if ($action === 'accept') {
        $query = "UPDATE events SET is_approved = 'approved' WHERE EventId = ?";
    } elseif ($action === 'reject') {
        $query = "UPDATE events SET is_approved = 'rejected' WHERE EventId = ?";
    } else {
        die("Invalid action.");
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $eventId);

    if ($stmt->execute()) {
        header("Location: pendingEventsView.php");
        exit();
    } else {
        die("Error updating event: " . $stmt->error);
    }
}
?>
