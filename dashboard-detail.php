<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard - Admin Dashboard</title>

    <?php include 'style.php'; ?> 
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
                        <a class="nav-link" href="viewactivity.php">Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewreport.php">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dashboard">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h2 class="mb-4">Dashboard</h2>
            <div class="row">
                <!-- Events Box -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="custom-block bg-white shadow-lg">
                        <h5 class="mt-2">Events</h5>
                        <div class="row">
                            <?php
                            // Sample array of events
                            $events = [
                                [
                                    'title' => 'Event 1',
                                    'description' => 'Description for event 1.',
                                    'image' => 'images/event1.jpg' // Update the image path
                                ],
                                [
                                    'title' => 'Event 2',
                                    'description' => 'Description for event 2.',
                                    'image' => 'images/event2.jpg' // Update the image path
                                ],
                                // Add more events as needed
                            ];

                            foreach ($events as $event) {
                                echo '<div class="col-6 mb-2">
                                        <div class="event-card">
                                            <img src="'.$event['image'].'" class="img-fluid" alt="'.$event['title'].'">
                                            <h6>'.$event['title'].'</h6>
                                            <p>'.$event['description'].'</p>
                                        </div>
                                    </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Clubs Box -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="custom-block bg-white shadow-lg">
                        <h5 class="mt-2">Clubs</h5>
                        <div class="row">
                            <?php
                            // Sample array of clubs
                            $clubs = [
                                [
                                    'name' => 'Club 1',
                                    'description' => 'Description for club 1.',
                                    'image' => 'images/club1.jpg' // Update the image path
                                ],
                                [
                                    'name' => 'Club 2',
                                    'description' => 'Description for club 2.',
                                    'image' => 'images/club2.jpg' // Update the image path
                                ],
                                // Add more clubs as needed
                            ];

                            foreach ($clubs as $club) {
                                echo '<div class="col-6 mb-2">
                                        <div class="club-card">
                                            <img src="'.$club['image'].'" class="img-fluid" alt="'.$club['name'].'">
                                            <h6>'.$club['name'].'</h6>
                                            <p>'.$club['description'].'</p>
                                        </div>
                                    </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
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
