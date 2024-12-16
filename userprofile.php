<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>View Activity - Admin Dashboard</title>

    <!-- CSS FILES -->        
    <?php include 'style.php'; ?>       
</head>
<?php
session_start(); // Start session

require 'databaseConnection.php'; // Include database connection

// Check if a username is passed in the URL
if (isset($_GET['username']) && $_GET['username'] === $_SESSION['username']) {
    $username = $_SESSION['username'];

    // Query to fetch user data
    $query = "SELECT Username, Email, UserId FROM users WHERE Username = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fetchedUsername, $fetchedEmail , $fetchedId);

        if ($stmt->fetch()) {
            echo "<h1>Welcome, " . htmlspecialchars($fetchedUsername) . "!</h1>";
            echo "<p>Email: " . htmlspecialchars($fetchedEmail) . "</p>";
            echo "<p>ID: " . htmlspecialchars($fetchedId) . "</p>";
        } else {
            echo "<p>User not found!</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
} else {
    echo "<p>Access denied. Please log in to view this page.</p>";
    exit();
}
?>


