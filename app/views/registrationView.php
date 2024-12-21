<?php


 include "navbarForStudents.php";
    require_once(__DIR__ . "/../db/Dbh.php");  // Include the DB connection
    require_once(__DIR__ . '/controller/RegistrationController.php');
     
session_start(); // Start the session to access user_id

// Check if user_id exists in the session
if (!isset($_SESSION['user_id'])) {
    die("<script>alert('Error: User is not logged in.'); window.location.href='/Student_Activity_Management_System/app/views/indexForStudents.php';</script>");
}


// Initialize the controller
$registrationController = new RegistrationController($conn);

// Handle POST request for event registration
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION['user_id']; // Retrieve user_id from session
    $event_id = $_POST['event_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $slot = $_POST['slot'];
    $role = $_POST['role'];

    // Call the controller to handle the registration logic
    $registrationController->registerUser($user_id, $event_id, $name, $email, $slot, $role);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Student Registration">
    <title>Event Registration</title>
    <?php include 'style.php'; ?>
</head>
<body>
    <?php include "navbarForStudents.php"; ?>
    <main>
        <section class="container py-5">
            <h3 class="text-center mb-5">Register for Event</h3>
            <form action="../../app/controller/RegistrationController.php" method="POST">
                <input type="hidden" name="event_id" value="<?= htmlspecialchars($event_id) ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="slot">Slot</label>
                    <input type="text" name="slot" id="slot" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </section>
    </main>
    <?php include "footer.php"; ?>
</body>
</html>
