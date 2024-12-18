<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Discover our clubs and register for events">
    <meta name="author" content="">
    <title>Topic Detail Page</title>

    <?php include 'style.php'; ?>
</head>

<body id="top">
    <?php include "navbarForStudents.php"; ?>
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
                        <h2 class="text-white">Introduction to <br> Our Clubs</h2>
                        <div class="d-flex align-items-center mt-5">
                            <a href="#topics-detail" class="btn custom-btn custom-border-btn smoothscroll me-4">Read
                                More</a>
                            <a href="#top" class="custom-icon bi-bookmark smoothscroll"></a>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12">
                        <div class="topics-detail-block bg-white shadow-lg">
                            <img src="images/introo.jpg" class="topics-detail-block-image img-fluid" alt="Intro Image">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="container py-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mb-5">Available Events</h3>
                </div>
            </div>
            <div class="row">
                <?php
                include 'databaseConnection.php'; // Ensure this connects to your database

                // Fetch approved events
                $query = "SELECT * FROM events WHERE is_approved = ?";
                $stmt = $conn->prepare($query);
                $approved = 'approved';
                $stmt->bind_param('s', $approved);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <img src="<?= htmlspecialchars($row['EventImage']) ?>" class="card-img-top"
                                    alt="<?= htmlspecialchars($row['EventName']) ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($row['EventName']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($row['EventDescription']) ?></p>
                                    <form action="submitRegistration.php" method="post">
                                        <input type="hidden" name="event_id"
                                            value="<?= htmlspecialchars($row['EventId']) ?>">
                                        <div class="mb-3">
                                            <label for="name-<?= $row['EventId'] ?>" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="name-<?= $row['EventId'] ?>"
                                                name="name" placeholder="Enter your name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email-<?= $row['EventId'] ?>" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email-<?= $row['EventId'] ?>"
                                                name="email" placeholder="Enter your email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="slot-<?= $row['EventId'] ?>" class="form-label">Preferred
                                                Slot</label>
                                            <select class="form-select" id="slot-<?= $row['EventId'] ?>" name="slot"
                                                required>
                                                <option value="morning">Morning</option>
                                                <option value="afternoon">Afternoon</option>
                                                <option value="evening">Evening</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Role</label>
                                            <div>
                                                <input type="radio" id="visitor-<?= $row['EventId'] ?>" name="role"
                                                    value="visitor" required>
                                                <label for="visitor-<?= $row['EventId'] ?>" class="me-3">Visitor</label>
                                                <input type="radio" id="ushering-<?= $row['EventId'] ?>" name="role"
                                                    value="ushering" required>
                                                <label for="ushering-<?= $row['EventId'] ?>">Ushering</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="text-center">No approved events available for registration.</p>';
                }

                $stmt->close();
                $conn->close();
                ?>
            </div>
        </section>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

    <?php include "footer.php"; ?>
</body>

</html>
