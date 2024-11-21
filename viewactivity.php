<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>View Activity - Admin Dashboard</title>

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
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="indexForAdmin.php">
                <i class="bi-back"></i>
                <span>UniConnect</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-5 me-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#activity">Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports-detail.php">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-detail.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h2 class="mb-4">Recent Activities</h2>
            <div class="row">
                <!-- Example Activity Item -->
                <div class="col-12 mb-4">
                    <div class="custom-block bg-white shadow-lg p-4">
                        <h5>Activity 1</h5>
                        <p>Description of activity 1.</p>
                        <form action="process_activity.php" method="POST">
                            <input type="hidden" name="activity_id" value="1">
                            <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                            <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                        </form>
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="custom-block bg-white shadow-lg p-4">
                        <h5>Activity 2</h5>
                        <p>Description of activity 2.</p>
                        <form action="process_activity.php" method="POST">
                            <input type="hidden" name="activity_id" value="2">
                            <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                            <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                        </form>
                    </div>
                </div>

                <!-- Add more activities as needed -->
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
                        <a href="index.php#activity" class="site-footer-link">Activity</a>
                    </li>
                    <li class="site-footer-link-item">
                        <a href="reports-detail.php" class="site-footer-link">Reports</a>
                    </li>
                    <li class="site-footer-link-item">
                        <a href="dashboard-detail.php" class="site-footer-link">Dashboard</a>
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
