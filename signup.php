
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
<!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
    </head>
    
    <body class="topics-listing-page" id="top">

        <main>
        <?php include"navbarForStudents.php";?>
           
            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="indexForStudents.php">Homepage</a></li>

                             <li class="breadcrumb-item active" aria-current="page">sign up</li>
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
                    <form id="signUpForm">
                        <input type="text" name="username" id="signUpUsername" placeholder="Username" required>
                        <span class="error" id="usernameError"></span>
            
                        <input type="email" name="email" id="signUpEmail" placeholder="Email" required>
                        <span class="error" id="emailError"></span>
            
                        <input type="password" name="password" id="signUpPassword" placeholder="Password" required>
                        <span class="error" id="passwordError"></span>
            
                        <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password" required>
                        <span class="error" id="confirmPasswordError"></span>
            
                        <button id="signupbuttuon " type="submit">Sign Up</button>
                    </form>
                    <div class="toggle-link">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                    
                </div>
            </section>
            
        </main>
        <?php include"footer.php";?>
        <!-- 
        <footer class="site-footer section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 mb-4 pb-2">
                        <a class="navbar-brand mb-2" href="index.html">
                            <i class="bi-back"></i>
                            <span>Topic</span>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">
                        <h6 class="site-footer-title mb-3">Resources</h6>

                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Home</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">How it works</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">FAQs</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                        <h6 class="site-footer-title mb-3">Information</h6>

                        <p class="text-white d-flex mb-1">
                            <a href="tel: 305-240-9671" class="site-footer-link">
                                305-240-9671
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <a href="mailto:info@company.com" class="site-footer-link">
                                info@company.com
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            English</button>

                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Thai</button></li>

                                <li><button class="dropdown-item" type="button">Myanmar</button></li>

                                <li><button class="dropdown-item" type="button">Arabic</button></li>
                            </ul>
                        </div>

                        <p class="copyright-text mt-lg-5 mt-4">Copyright © 2048 Topic Listing Center. All rights reserved.
                        <br><br>Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                        
                    </div>

                </div>
            </div>
        </footer> -->

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/signup.js"></script>
    </body>

<!-- databaseconnection -->
<!-- databaseconnection -->
<?php
 $servername="localhost";
 $username="root";
 $password="";
 $DB="studentactivitymanagment";

 $conn= mysqli_connect($servername, $username, $password, $DB);

 if(!$conn){
    die("connection failed: " . mysqli_connect_error());
 }
 echo "connected successfully";

 $sql = "insert into users (firstname, lastname, email)
        values('John', 'Doe', 'john@example.com')";

if($conn->query($sql)== TRUE){
    echo "New record created successfully";
}
else{
    echo "Error: " .$sql . "<br>" . $conn->error;
}
$conn->close();
?>
</html>