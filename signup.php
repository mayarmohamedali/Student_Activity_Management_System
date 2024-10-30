<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Topic Listing Contact Page</title>

    <!-- CSS FILES -->        
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
include_once 'databaseConnection.php'; 
// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get and sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<p style='color:red;'>Passwords do not match.</p>";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmailSql = "SELECT * FROM signup WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmailSql);

    if (mysqli_num_rows($result) > 0) {
        // Email exists
        echo "<p style='color:red;'>Email already exists. Please use a different email.</p>";
    } else {
        // Insert new user into the database
        $insertSql = "INSERT INTO signup (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";
        if (mysqli_query($conn, $insertSql)) {
            // Set session variables
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role === "student") {
                header("Location: indexForStudents.php");
                exit;
            } elseif ($role === "club & organization") {
                header("Location: indexForClubsAndOrganizations.php");
                exit;
            }
        } else {
            echo "<p style='color:red;'>Error in creating account. Please try again later.</p>";
        }
    }
}
?>

<main>
    <?php include "navbarForStudents.php"; ?>
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="indexForStudents.php">Homepage</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                        </ol>
                    </nav>
                    <h2 class="text-white">Create account</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="section-padding section-bg" id="signUpSection">
        <div class="sign-up-container">
            <h2>Sign Up</h2>
            <form id="signUpForm" method="post">
                <input type="text" name="username" id="signUpUsername" placeholder="Username" required>
                <span class="error" id="usernameError"></span>

                <input type="email" name="email" id="signUpEmail" placeholder="Email" required>
                <span class="error" id="emailError"></span>

                <input type="password" name="password" id="signUpPassword" placeholder="Password" required>
                <span class="error" id="passwordError"></span>

                <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password" required>
                <span class="error" id="confirmPasswordError"></span>

                <!-- Dropdown for role selection -->
                <select name="role" id="role" required>
                    <option value="" disabled selected>Select your role</option>
                    <option value="student">Student</option>
                    <option value="club & organization">Club & Organization</option>
                    <option value="admin">Admin</option>
                </select>
                <span class="error" id="roleError"></span>

                <input id="signupbutton" type="submit" name = "submit" value = "Signup">
            </form>
            <div class="toggle-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
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
</body>
</html>