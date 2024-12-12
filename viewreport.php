<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>View Reports - Admin Dashboard</title>

    <!-- CSS FILES -->        
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-topic-listing.css" rel="stylesheet">  
</head>

<body id="top">
<main>
   <?php include"navbarForAdmin.php";?>

    <section class="hero-section">
        <div class="container">

            <h2 class="mb-4">Submit Your Opinion</h2>
            <form action="process_report.php" method="POST">
                <div class="mb-3">
                    <label for="event" class="form-label">Event Name</label>
                    <input type="text" class="form-control" id="event" name="event" required>
                </div>
                <div class="mb-3">
                    <label for="opinion" class="form-label">Your Opinion</label>
                    <textarea class="form-control" id="opinion" name="opinion" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Opinion</button>
            </form>
        </div>
    </section>
</main>

<footer class="site-footer section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 mb-4 pb-2">
                <a class="navbar-brand mb-2" href="index.php">
                    <i class="bi-back"></i>
                    <span>Admin</span>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <h6 class="site-footer-title mb-3">Resources</h6>
                <ul class="site-footer-links">
                    <li class="site-footer-link-item">
                        <a href="index.php" class="site-footer-link">Home</a>
                    </li>
                    <li class="site-footer-link-item">
                        <a href="#activity" class="site-footer-link">Activity</a>
                    </li>
                    <li class="site-footer-link-item">
                        <a href="viewreport.php" class="site-footer-link">Reports</a>
                    </li>
                    <li class="site-footer-link-item">
                        <a href="#dashboard" class="site-footer-link">Dashboard</a>
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
