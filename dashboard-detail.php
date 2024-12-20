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
                            // Database connection
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "uniconnect";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Query to fetch approved events
                            $sql = "SELECT EventName, EventDescription, EventImage, EventDate, EventTimeSlot, EventLocation 
                                    FROM events 
                                    WHERE is_approved = 'approved'";
                            $result = $conn->query($sql);

                            // Check if the query was successful
                            if ($result === false) {
                                die("Error in query: " . $conn->error);
                            }

                            if ($result->num_rows > 0) {
                                while ($event = $result->fetch_assoc()) {
                                    echo '<div class="col-6 mb-2">
                                            <div class="event-card">
                                                <img src="'.htmlspecialchars($event['EventImage']).'" class="img-fluid" alt="'.htmlspecialchars($event['EventName']).'">
                                                <h6>'.htmlspecialchars($event['EventName']).'</h6>
                                                <p>'.htmlspecialchars($event['EventDescription']).'</p>
                                                <p><strong>Date:</strong> '.htmlspecialchars($event['EventDate']).'</p>
                                                <p><strong>Time:</strong> '.htmlspecialchars($event['EventTimeSlot']).'</p>
                                                <p><strong>Location:</strong> '.htmlspecialchars($event['EventLocation']).'</p>
                                            </div>
                                          </div>';
                                }
                            } else {
                                echo '<p class="col-12">No approved events found.</p>';
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
    // Query for clubs and their associated event names
    $sql = "SELECT c.ClubAndOrganizationName AS club_name, e.EventName 
            FROM clubsandorganizations c
            LEFT JOIN events e ON c.EventID = e.EventID";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result === false) {
        die("Error in query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        while ($club = $result->fetch_assoc()) {
            echo '<div class="col-6 mb-2">
                    <div class="club-card">
                        <h6>'.htmlspecialchars($club['club_name']).'</h6>
                        <p><strong>Event:</strong> '.($club['EventName'] ? htmlspecialchars($club['EventName']) : 'No event assigned').'</p>
                    </div>
                  </div>';
        }
    } else {
        echo '<p class="col-12">No clubs found.</p>';
    }

    // Close the connection
    $conn->close();
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
