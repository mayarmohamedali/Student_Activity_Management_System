<?php

// Update the paths to correctly reference the classes
require_once(__DIR__ . "/../db/Dbh.php");  // Include the DB connection
require_once(__DIR__ . "/../Model/RegistrationModel.php");  // Include the EventModel class

class RegistrationController {
    private $registrationModel;

    public function __construct($dbConn) {
        $this->registrationModel = new RegistrationModel($dbConn);
    }

    public function registerUser($user_id, $event_id, $name, $email, $slot, $role) {
        try {
            // Attempt registration
            $success = $this->registrationModel->registerUser($user_id, $event_id, $name, $email, $slot, $role);
            if ($success) {
                echo "<script>
                        alert('Registration successful!');
                        window.location.href = 'StudentClubRegisteration.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Error: Could not register.');
                        window.history.back();
                      </script>";
            }
        } catch (Exception $e) {
            echo "<script>
                    alert('". $e->getMessage() ."');
                    window.history.back();
                  </script>";
        }
    }
}
?>
