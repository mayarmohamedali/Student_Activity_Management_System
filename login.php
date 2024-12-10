<<<<<<< HEAD
<?php
session_start();  // Start the session to store user data
=======
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Page</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-topic-listing.css" rel="stylesheet">
    <link href="css/signup.css" rel="stylesheet">
</head>
<body class="topics-listing-page" id="top">
<?php 
include 'databaseConnection.php'; 
if (isset($_POST['submit'])) {
   echo $email = mysqli_real_escape_string($conn, $_POST['email']);
   echo $password = $_POST['password'];
>>>>>>> 9359b4f31ee33f1497dbf4a7bf6545b1ff850fa4

include 'databaseConnection.php';

$message = ""; // To store login error or success messages

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to check if user exists
    $query = "SELECT * FROM Users WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User exists, fetch the user data
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Password'])) {
            // Password matches, start session and store user info
            $_SESSION['user_id'] = $user['UserId'];
            $_SESSION['username'] = $user['Username'];
            $_SESSION['userTypeId'] = $user['UserTypeId'];

            // Check the UserTypeId to redirect to the appropriate page
            if ($user['UserTypeId'] == 1) {
                // Redirect to the student page
                echo "<script>
                        // alert('Login successful! Redirecting to student page...');
                        window.location.href = 'indexForStudents.php';  // Redirect to the student page
                      </script>";
            } elseif ($user['UserTypeId'] == 2) {
                // Redirect to the club organizer page
                echo "<script>
                        // alert('Login successful! Redirecting to club organizer page...');
                        window.location.href = 'indexForClubsAndOrganizations.php';  // Redirect to the club organizer page
                      </script>";
            }
        } else {
            // Password does not match
            $message = "Invalid email or password.";
        }
    } else {
        // User does not exist
        $message = "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .login-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>
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

<<<<<<< HEAD
=======
<section class="section-padding section-bg" id="signUpSection">
                <div class="sign-up-container">
                    <h2>Login</h2>
                    <form id="loginForm" method="post">
                        <input type="email" name="email" id="loginEmail" placeholder="Email" required>
                        <span class="error" id="loginEmailError"></span>
        
                        <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                        <span class="error" id="loginPasswordError"></span>
        
                    <input name="submit" type="submit" value="login"> 
                    </form>
                    <div class="toggle-link">
                        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                    </div>
                    
                </div>
                </div>
            </section>

</main>

<?php include "footer.php"; ?>
<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/custom.js"></script>
<script src="js/signup.js"></script>
>>>>>>> 9359b4f31ee33f1497dbf4a7bf6545b1ff850fa4
</body>
</html>
