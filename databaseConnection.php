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
    // Insert data into the signup table
    $sql = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
};
// Close connection
$conn->close();
?>
