<?php
require("../app/db/Dbh.php");
require("../app/Model/User.php");

$db = new DBh(); // Use DBh for connection
$conn = $db->getConn();


$message = ""; // To store login error or success messages
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the database connection is valid
    if (!$conn) {
        die("Database connection is not initialized.");
    }

    try {
        $auth = new UserAuthentication($conn);
        $message = $auth->authenticate($email, $password);
    } catch (Exception $e) {
        $message = "An error occurred: " . $e->getMessage();
    }
}

//$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-topic-listing.css" rel="stylesheet">  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    
   
</head>
<body>

    <div class="login-form">
        <h2 class="text-center">Login</h2>
        <?php if ($message != "") { echo "<p class='error-message'>$message</p>"; } ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
