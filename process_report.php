<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event = $_POST['event'];
    $opinion = $_POST['opinion'];

    // Here you would typically insert the data into a database
    // For demonstration, we'll just echo it
    echo "Thank you for your opinion on $event: $opinion";

    // Redirect back to the view report page or display a confirmation message
    // header("Location: viewreport.php");
    // exit();
}
?>
