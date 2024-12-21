<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>UniConnect</title>

    
    <?php include "style.php"; ?>   

    
</head>

<body id="top">
<?php include "navbarForAdmin.php";?>
<main>

    <section class="hero-section d-flex justify-content-center align-items-center" id="activity">
        <div class="container">
            <div class="row">




            <div class="col-lg-4 col-12 mb-4">
    <div class="custom-block bg-white shadow-lg">
        <h5 class="mb-2">Add </h5>
        <p class="mb-0">students</p>
       <a href="/Student_Activity_Management_System/app/views/Addstudent.php" class="btn custom-btn mt-2">Add student</a>

    </div>
</div>
                <div class="col-lg-4 col-12 mb-4">
                    <div class="custom-block bg-white shadow-lg">
                        <h5 class="mb-2">Add</h5>
                        <p class="mb-0">Clubs and Organizations</p>
                        <a href="/Student_Activity_Management_System/app/views/addclub.php" class="btn custom-btn mt-2">Add Club and Organization</a>
                    </div>
              
              
              
              
                </div>

             
    </section>
</main>

<footer class="site-footer section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 mb-4 pb-2">
                <a class="navbar-brand mb-2" href="index.php">
                    <i class="bi-back"></i>
                    <span>UniConnect</span>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <h6 class="site-footer-title mb-3">Resources</h6>
                <ul class="site-footer-links">
                    <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">Home</a>
                    </li>
                    <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">Activity</a>
                    </li>
                    <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">Reports</a>
                    </li>
                    <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>



<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
