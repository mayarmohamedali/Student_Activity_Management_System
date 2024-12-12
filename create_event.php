<?php
include 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $EventName = $_POST["EventName"];
    $ClubName = $_POST["ClubName"];
    $EventDescription = $_POST["EventDescription"];
    $EventDate = $_POST["EventDate"];
    $EventTimeSlot = $_POST["EventTimeSlot"];
    $EventLocation = $_POST["EventLocation"];

    // Handle the uploaded photo
    if (isset($_FILES['EventImage']) && $_FILES['EventImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/event_images/';
        $fileName = uniqid() . "_" . basename($_FILES['EventImage']['name']); // Add a unique prefix to avoid file name conflicts
        $uploadFilePath = $uploadDir . $fileName;

        // Ensure the directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
        }

        // Move the uploaded file to the server directory
        if (move_uploaded_file($_FILES['EventImage']['tmp_name'], $uploadFilePath)) {
            $EventImage = $uploadFilePath;
        } else {
            die("Failed to upload the event image. Please check file permissions.");
        }
    } else {
        die("No event image uploaded or error uploading the image. Error code: " . $_FILES['EventImage']['error']);
    }

    // Prepare the SQL query
    $query = "INSERT INTO events (EventName, ClubName, EventDescription, EventImage, EventDate, EventTimeSlot, EventLocation, is_approved) 
              VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Error preparing query: " . $conn->error);
    }

    // Bind parameters to the query
    $stmt->bind_param("sssssss", $EventName, $ClubName, $EventDescription, $EventImage, $EventDate, $EventTimeSlot, $EventLocation);

    // Execute the query
    if ($stmt->execute()) {
        echo "Event created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
