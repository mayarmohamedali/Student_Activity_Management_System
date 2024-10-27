<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Topic Detail Page</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/StudentClubRegisteration.css" rel="stylesheet">
    </head>
    
    <body id="top">
    <?php include"navbar.php";?>
        <main>
    

            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-5 col-12 mb-5">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">organizations</li>
                                </ol>
                            </nav>

                            <h2 class="text-white">Introduction to <br> Our Organizations</h2>

                            <div class="d-flex align-items-center mt-5">
                                <a href="#topics-detail" class="btn custom-btn custom-border-btn smoothscroll me-4">Read More</a>
                                <a href="#top" class="custom-icon bi-bookmark smoothscroll"></a>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12">
                            <div class="topics-detail-block bg-white shadow-lg">
                                <img src="images/MIUUU.jpg" class="topics-detail-block-image img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <section class="section-padding">
                <div class="col-lg-8 col-12 m-auto">
                    <h3 class="mb-4">Why Join Our University Organization?</h3>
                    <p><strong>Becoming part of a university organization opens doors to new friendships, valuable skills, and a strong professional network...</strong></p>
                </div>
            </section>

            <?php
                // PHP for handling form submissions
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    $email = $_POST['email'];

                    // You can add validation or store the data in a database
                    echo "<div class='alert alert-success' role='alert'>Thank you, $name! You have successfully registered with the email: $email.</div>";
                }
            ?>

            <div class="container">
                <div class="row justify-content-center">
                    <!-- Utopia Organization -->
                    <div class="col-lg-8 col-md-10 col-sm-12 mb-5">
                        <div class="organization-container p-4" style="border: 1px solid #c7c9d0; border-radius: 4px; text-align: center; max-width: 700px; margin: 0 auto; background-color: #f0f8ff;">
                            <img src="images/Utopia.jpeg" class="img-fluid mb-3" style="max-width: 80%; height: auto;" alt="Utopia Organization Image">
                            <h4>Utopia</h4>
                            <p>Join Utopia for engaging activities and community events.</p>

                            <form class="custom-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                <div class="form-group">
                                    <label for="name1">Full Name</label>
                                    <input type="text" class="form-control" id="name1" name="name" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email1">Email</label>
                                    <input type="email" class="form-control" id="email1" name="email" placeholder="Enter your email" required>
                                </div>
                                <button type="submit" class="form-control">Register</button>
                            </form>
                        </div>
                    </div>

                    <!-- Admissions Organization -->
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="organization-container p-4" style="border: 1px solid #d7d8e3; border-radius: 4px; text-align: center; max-width: 700px; margin: 0 auto; background-color: #f0f8ff;">
                            <img src="images/admission.jpeg" class="img-fluid mb-3" style="max-width: 80%; height: auto;" alt="Admissions Organization Image">
                            <h4> Admissions</h4>
                            <p>Join Admissions and be a part of various academic activities.</p>

                            <form class="custom-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                <div class="form-group">
                                    <label for="name2">Full Name</label>
                                    <input type="text" class="form-control" id="name2" name="name" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email2">Email</label>
                                    <input type="email" class="form-control" id="email2" name="email" placeholder="Enter your email" required>
                                </div>
                                <button type="submit" class="form-control">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <?php include"footer.php";?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
