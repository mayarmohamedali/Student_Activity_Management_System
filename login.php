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
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-icons.css" rel="stylesheet">
    <link href="/css/templatemo-topic-listing.css" rel="stylesheet">
    <link href="css/signup.css" rel="stylesheet">
</head>
<body class="topics-listing-page" id="top">
<?php 
include 'databaseConnection.php'; 
if (isset($_POST['submit'])) {
   echo $email = mysqli_real_escape_string($conn, $_POST['email']);
   echo $password = $_POST['password'];

    // SQL query to retrieve user based on email
    $sql = "SELECT email, password, role FROM signup WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Check if user exists
    if (mysqli_num_rows($result) === 1) {
        // Fetch user data
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            if ($row['role'] === "student") {
                header("Location: indexForStudents.php");
                exit;
            } elseif ($row['role'] === "club & organization") {
                header("Location: indexForClubsAndOrganizations.php");
                exit;
            }
        } else {
            echo "<p style='color:red;'>Incorrect password.</p>";
        }
    } else {
        echo "<p style='color:red;'>Email does not exist in the system.</p>";
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
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
                <h2 class="text-white">Login</h2>
            </div>
        </div>
    </div>
</header>

<section class="section-padding section-bg" id="signUpSection">
                <div class="sign-up-container">
                    <h2>Login</h2>
                    <form id="loginForm" method="post">
                        <input type="email" name="email" id="loginEmail" placeholder="Email" required>
                        <span class="error" id="loginEmailError"></span>
        
                        <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                        <span class="error" id="loginPasswordError"></span>
        
                    <input name="submit" type="Submit" value="login"> 
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
</body>
</html>