<?php

require(__DIR__ . "../../db/Dbh.php");
require_once(__DIR__ . '/../controller/EventController.php');




// Initialize Controller and Fetch Events
$eventController = new EventController($conn);
$events = $eventController->showPendingEvents();

if (!$events) {
    die("Failed to fetch pending events.");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Manage Pending Events">
    <title>Pending Events</title>
    <?php include 'style.php'; ?>
</head>

<body>
    <?php include "navbarForAdmin.php"; ?>
    <main>
        <section class="container py-5">
            <h3 class="text-center mb-5">Pending Events for Approval</h3>
            <div class="row">
                <?php
                if ($events->num_rows > 0) {
                    while ($row = $events->fetch_assoc()) {
                        ?>
                        <div class="col-12 mb-4">
                            <div class="custom-block bg-white shadow-lg p-4">
                                <h5><?= htmlspecialchars($row['EventName']) ?></h5>
                                <p><strong>Description:</strong> <?= htmlspecialchars($row['EventDescription']) ?></p>
                                <p><strong>Date:</strong> <?= htmlspecialchars($row['EventDate']) ?></p>
                                <p><strong>Time Slot:</strong> <?= htmlspecialchars($row['EventTimeSlot']) ?></p>
                                <p><strong>Location:</strong> <?= htmlspecialchars($row['EventLocation']) ?></p>
                                <form action="" method="POST">
                                    <input type="hidden" name="event_id" value="<?= htmlspecialchars($row['EventId']) ?>">
                                    <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                                    <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p>No events pending approval.</p>';
                }
                ?>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>
</html>
