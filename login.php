<?php
session_start(); // Start the session

include 'databaseConnection.php';

class UserAuthentication {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function authenticate($email, $password) {
        $user = $this->getUserByEmail($email);

        if ($user && $this->verifyPassword($password, $user['Password'])) {
            $this->initializeSession($user);
            $this->redirectUser($user['UserTypeId']);
        } else {
            return "Invalid email or password.";
        }
    }

    private function getUserByEmail($email) {
        $query = "SELECT * FROM Users WHERE Email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    private function verifyPassword($inputPassword, $storedPassword) {
        return password_verify($inputPassword, $storedPassword);
    }

    private function initializeSession($user) {
        $_SESSION['user_id'] = $user['UserId'];
        $_SESSION['username'] = $user['Username'];
        $_SESSION['userTypeId'] = $user['UserTypeId'];
    }

    private function redirectUser($userTypeId) {
        switch ($userTypeId) {
            case 1:
                $this->redirect("indexForStudents.php");
                break;
            case 2:
                $this->redirect("indexForClubsAndOrganizations.php");
                break;
            case 3:
                $this->redirect("indexForAdmin.php");
                break;
            default:
                exit("Invalid user type.");
        }
    }

    private function redirect($url) {
        echo "<script>window.location.href = '$url';</script>";
        exit();
    }
}

// Main execution
$message = ""; // To store login error or success messages
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $auth = new UserAuthentication($conn);
    $message = $auth->authenticate($email, $password);
}

$conn->close();
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
   
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
