<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Topic Detail Page</title>

    <!-- CSS FILES -->        
  
<!-- CSS FILES -->        
         <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-topic-listing.css" rel="stylesheet">      

        <link href="css/StudentClubRegisteration.css" rel="stylesheet">
    <!-- TemplateMo 590 topic listing -->
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
                            <li class="breadcrumb-item active" aria-current="page">Clubs</li>
                        </ol>
                    </nav>
                    <h2 class="text-white">Introduction to <br> our clubs </h2>
                    <div class="d-flex align-items-center mt-5">
                        <a href="#topics-detail" class="btn custom-btn custom-border-btn smoothscroll me-4">Read More</a>
                        <a href="#top" class="custom-icon bi-bookmark smoothscroll"></a>
                    </div>
                </div>

                <div class="col-lg-5 col-12">
                    <div class="topics-detail-block bg-white shadow-lg">
                        <img src="images/introo.jpg" class="topics-detail-block-image img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="topics-detail-section section-padding" id="topics-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 m-auto">
                    <h3 class="mb-4">Introduction to our clubs </h3>
                    <p>Welcome to MIU Clubs! Our vibrant campus community offers a wide variety of student-run clubs and organizations that cater to diverse interests and passions. Whether you're into sports, technology, arts, culture, or social causes, there’s something for everyone.</p>
                    <p><strong>Joining a club is a great way to meet new people, develop leadership skills, and enhance your university experience.</strong></p>
                    <blockquote>Explore the many opportunities we offer and become part of a community that shares your enthusiasm!</blockquote>

                    <section class="section-padding">
                        <div class="container">
                            <div class="row justify-content-center">

                                <!-- Club 1 -->
                                <div class="col-lg-8 col-md-10 col-sm-12">
                                    <div class="club-container p-3" style="border: 1px solid #ddd; border-radius: 8px; background-color: #f7f7f7;">
                                        <img src="images/ACPC.jpeg" class="img-fluid mb-3" style="max-width: 100%; height: auto;" alt="Club 1 Image">
                                        <h4> ACPC</h4>
                                        <p>Welcome to ACPC! Join us for exciting activities and events.</p>

                                        <form class="custom-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                            <div class="form-group">
                                                <label for="name1">Full Name</label>
                                                <input type="text" class="form-control" id="name1" name="name1" placeholder="Enter your name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email1">Email</label>
                                                <input type="email" class="form-control" id="email1" name="email1" placeholder="Enter your email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="slot1">Preferred Slot</label>
                                                <select class="form-control" id="slot1" name="slot1" required>
                                                    <option value="morning">Morning</option>
                                                    <option value="afternoon">Afternoon</option>
                                                    <option value="evening">Evening</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <div>
                                                    <input type="radio" id="visitor1" name="role1" value="visitor" required>
                                                    <label for="visitor1">Visitor</label>
                                                    <input type="radio" id="ushering1" name="role1" value="ushering" required>
                                                    <label for="ushering1">Ushering</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="form-control">Register</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Space between clubs -->
                                <div class="w-100 my-4"></div>

                                <!-- Club 2 -->
                                <div class="col-lg-8 col-md-10 col-sm-12">
                                    <div class="club-container p-3" style="border: 1px solid #ddd; border-radius: 8px; background-color: #f7f7f7;">
                                        <img src="images/MUN.jpeg" class="img-fluid mb-3" style="max-width: 100%; height: auto;" alt="Club 2 Image">
                                        <h4>MUN</h4>
                                        <p>Be part of MUN and enjoy various events and activities.</p>

                                        <form class="custom-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                            <div class="form-group">
                                                <label for="name2">Full Name</label>
                                                <input type="text" class="form-control" id="name2" name="name2" placeholder="Enter your name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email2">Email</label>
                                                <input type="email" class="form-control" id="email2" name="email2" placeholder="Enter your email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="slot2">Preferred Slot</label>
                                                <select class="form-control" id="slot2" name="slot2" required>
                                                    <option value="morning">Morning</option>
                                                    <option value="afternoon">Afternoon</option>
                                                    <option value="evening">Evening</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <div>
                                                    <input type="radio" id="visitor2" name="role2" value="visitor" required>
                                                    <label for="visitor2">Visitor</label>
                                                    <input type="radio" id="ushering2" name="role2" value="ushering" required>
                                                    <label for="ushering2">Ushering</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="form-control">Register</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</main>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>
</main>
   <?php include"footer.php";?>
</body>
</html>
