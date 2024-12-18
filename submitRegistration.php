<?php
session_start(); // Start the session to access user_id

include 'databaseConnection.php'; // Include database connection file

// Check if user_id exists in the session
if (!isset($_SESSION['user_id'])) {
    die("<script>alert('Error: User is not logged in.'); window.location.href='indexForStudents.php';</script>");
}

// Retrieve user_id from session
$user_id = $_SESSION['user_id'];

// Get form data
$event_id = $_POST['event_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$slot = $_POST['slot'];
$role = $_POST['role'];

try {
    // Use prepared statements to prevent SQL injection
    $query = "INSERT INTO registrations (UserId, EventId, Name, Email, Slot, Role) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iissss", $user_id, $event_id, $name, $email, $slot, $role);

    if ($stmt->execute()) {
        // Output JavaScript for alert and reload the specific page
        echo "<script>
                alert('Registration successful!');
                window.location.href = 'StudentClubRegisteration.php'; // Redirect to the same page
              </script>";
        exit();
    } else {
        throw new Exception("Error: Could not execute query.");
    }
} catch (Exception $e) {
    // Output error message with alert
    echo "<script>
            alert('". $e->getMessage() ."');
            window.history.back();
          </script>";
}

// Close the connection
$conn->close();
?>
