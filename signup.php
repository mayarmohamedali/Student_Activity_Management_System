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
    include 'databaseConnection.php'; 
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
        <form id="signUpForm" method="POST">
            <input type="text" name="username" id="signUpUsername" placeholder="Username" required>
            <span class="error" id="usernameError"></span>

            <input type="email" name="email" id="signUpEmail" placeholder="Email" required>
            <span class="error" id="emailError"></span>

            <input type="password" name="password" id="signUpPassword" placeholder="Password" required>
            <span class="error" id="passwordError"></span>

            <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password" required>
            <span class="error" id="confirmPasswordError"></span>

            <!-- Dropdown for role selection -->
            <label for="role">I am a: </label>
            <select name="role" id="role" required>
                <option value="" disabled selected>Select your role</option>
                <option value="student">Student</option>
                <option value="club">Club</option>
                <option value="organization">Organization</option>
            </select>
            <span class="error" id="roleError"></span>

            <button id="signupbutton" type="submit">Sign Up</button>
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
