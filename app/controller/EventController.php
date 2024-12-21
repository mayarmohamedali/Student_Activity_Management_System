<?php

require(__DIR__ . "/../db/Dbh.php");
require(__DIR__ . "/../Model/EventModel.php");


class EventController
{
    private $dbConnection;
    private $eventModel;

    public function __construct()
    {
        // Establish the database connection using the Dbh class
        $db = new Dbh();
        $this->dbConnection = $db->getConn();

        // Initialize the model with the database connection
        $this->eventModel = new EventModel($this->dbConnection);
    }

    public function handleEventCreation($postData, $fileData)
    {
        // Retrieve the data from the POST request
        $EventName = $postData["EventName"];
        $ClubName = $postData["ClubName"];
        $EventDescription = $postData["EventDescription"];
        $EventDate = $postData["EventDate"];
        $EventTimeSlot = $postData["EventTimeSlot"];
        $EventLocation = $postData["EventLocation"];

        // Handle file upload for event image
        if (isset($fileData['EventImage']) && $fileData['EventImage']['error'] === UPLOAD_ERR_OK) {
            $EventImage = $this->uploadEventImage($fileData['EventImage']);
            if ($EventImage === false) {
                echo "<script>alert('Failed to upload the event image.'); window.history.back();</script>";
                return;
            }
        } else {
            echo "<script>alert('No event image uploaded or error uploading the image.'); window.history.back();</script>";
            return;
        }

        // Validate the input data
        if (empty($EventName) || empty($ClubName) || empty($EventDescription) || empty($EventDate) || empty($EventTimeSlot) || empty($EventLocation)) {
            echo "<script>alert('All fields are required.'); window.history.back();</script>";
            return;
        }

        // Create the event using the model
        $isCreated = $this->eventModel->createEvent($EventName, $ClubName, $EventDescription, $EventImage, $EventDate, $EventTimeSlot, $EventLocation);
        if ($isCreated) {
            echo "<script>alert('Event created successfully!'); window.location.href = '../../app/views/indexForClubsAndOrganizations.php';</script>";
        } else {
            echo "<script>alert('Error: Could not create the event.'); window.history.back();</script>";
        }
    }

    private function uploadEventImage($eventImage)
    {
        // Define the upload directory and create it if it doesn't exist
        $uploadDir = 'uploads/event_images/';
        $fileName = uniqid() . "_" . basename($eventImage['name']);
        $uploadFilePath = $uploadDir . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($eventImage['tmp_name'], $uploadFilePath)) {
            return $uploadFilePath;
        } else {
            return false;
        }
    }
    public function showApprovedEvents()
    {
        $events = $this->eventModel->getApprovedEvents();
        include 'views/approvedEventsView.php'; // Include the view for displaying events
    }

    // Display pending events for approval
    public function showPendingEvents()
    {
        return $this->eventModel->getPendingEvents();
    }
    
    // Handle the event approval/rejection
    public function handleEventAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $action = $_POST['action']; // Either "accept" or "reject"
            $eventId = $_POST['event_id']; // Get the event ID

            if ($action === 'accept') {
                $this->eventModel->updateEventApproval($eventId, 'approved');
                $message = 'Event approved successfully!';
            } elseif ($action === 'reject') {
                $this->eventModel->deleteEvent($eventId);
                $message = 'Event rejected and deleted successfully!';
            }

            echo "<p>$message</p>";
            header('Location: index.php'); // Redirect after action

            
            exit();
        }
    }
}
   

// Main Script
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller = new EventController();
    $controller->handleEventCreation($_POST, $_FILES);
}
