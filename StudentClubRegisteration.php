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
<?php include"navbarForStudents.php";?>
<main>


    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-12 mb-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="indexForStudents.php">Homepage</a></li>
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
    <?php
include 'databaseConnection.php'; // Ensure this connects to your database

// Fetch approved events
$query = "SELECT * FROM events WHERE is_approved = 'approved'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="club-container p-3" style="border: 1px solid #ddd; border-radius: 8px; background-color: #f7f7f7;">';
        echo '<img src="' . htmlspecialchars($row['EventImage']) . '" class="img-fluid mb-3" style="max-width: 100%; height: auto;" alt="Event Image">';
        echo '<h4>' . htmlspecialchars($row['EventName']) . '</h4>';
        echo '<p>' . htmlspecialchars($row['EventDescription']) . '</p>';

        // Registration form for each event
        echo '<form class="custom-form" action="submitRegistration.php" method="post">';
        echo '<input type="hidden" name="event_id" value="' . htmlspecialchars($row['EventId']) . '">';
        echo '<div class="form-group">';
        echo '<label for="name">Full Name</label>';
        echo '<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="email">Email</label>';
        echo '<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="slot">Preferred Slot</label>';
        echo '<select class="form-control" id="slot" name="slot" required>';
        echo '<option value="morning">Morning</option>';
        echo '<option value="afternoon">Afternoon</option>';
        echo '<option value="evening">Evening</option>';
        echo '</select>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label>Role</label>';
        echo '<div>';
        echo '<input type="radio" id="visitor" name="role" value="visitor" required>';
        echo '<label for="visitor">Visitor</label>';
        echo '<input type="radio" id="ushering" name="role" value="ushering" required>';
        echo '<label for="ushering">Ushering</label>';
        echo '</div>';
        echo '</div>';
        echo '<button type="submit" class="form-control">Register</button>';
        echo '</form>';
        echo '</div>';
    }
} else {
    echo '<p>No approved events available for registration.</p>';
}

$conn->close();
?>

                              
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
