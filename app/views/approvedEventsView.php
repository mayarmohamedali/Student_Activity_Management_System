<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Discover available events">
    <meta name="author" content="">
    <title>Approved Events</title>

    <?php include 'style.php'; ?>
</head>

<body>
    <?php include "navbarForStudents.php"; ?>
    <main>
        <section class="container py-5">
            <h3 class="text-center mb-5">Available Events</h3>
            <div class="row">
                <?php
                if ($events->num_rows > 0) {
                    while ($row = $events->fetch_assoc()) {
                        ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <img src="<?= htmlspecialchars($row['EventImage']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['EventName']) ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($row['EventName']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($row['EventDescription']) ?></p>
                                    <form action="submitRegistration.php" method="post">
                                        <input type="hidden" name="event_id" value="<?= htmlspecialchars($row['EventId']) ?>">
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
                ?>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>
</html>
