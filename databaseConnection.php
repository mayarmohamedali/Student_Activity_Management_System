<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "student_activity_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $role = $_POST['role']; // Get the role from the form

    // Insert data into the signup table
    $sql = "INSERT INTO signup (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Redirect based on role
        if ($role === "student") {
            echo "<script>window.location.href = 'indexForStudents.php';</script>";
        } elseif ($role === "club & organization") {
            echo "<script>window.location.href = 'indexForClubsAndOrganizations.php';</script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
// Close connection
$conn->close();
?>