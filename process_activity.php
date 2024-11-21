<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $activity_id = $_POST['activity_id'];
    $action = $_POST['action'];

    // Process the action (accept or reject)
    if ($action == 'accept') {
        // Code to handle accepting the activity
        echo "Activity $activity_id has been accepted.";
    } elseif ($action == 'reject') {
        // Code to handle rejecting the activity
        echo "Activity $activity_id has been rejected.";
    }

    // Redirect back to view activity page
    header("Location: viewactivity.php");
    exit();
}
?>
