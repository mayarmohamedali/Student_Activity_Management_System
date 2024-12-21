<?php

require(__DIR__ . "/../db/Dbh.php");
require(__DIR__ . "/../Model/ClubModel.php");

class ClubController
{
    private $dbConnection;
    private $clubModel;

    public function __construct()
    {
        $db = new Dbh();
        $this->dbConnection = $db->getConn();
        $this->clubModel = new ClubModel($this->dbConnection);
    }

    public function handleClubCreation($postData)
    {
        $username = $postData["username"];
        $email = $postData["email"];
        $password = password_hash($postData["password"], PASSWORD_BCRYPT);
        $userTypeId = $postData["userTypeId"];
        $clubName = $postData["ClubAndOrganizationName"] ?? null;
        $clubDescription = $postData["ClubAndOrganizationDescription"] ?? null;

        // Validate input
        if (empty($username) || empty($email) || empty($password) || empty($clubName) || empty($clubDescription)) {
            echo "<script>
                    alert('All fields are required.');
                    window.history.back();
                  </script>";
            return;
        }

        // Check if user exists
        if ($this->clubModel->isUserExists($username, $email)) {
            echo "<script>
                    alert('Username or Email already exists. Please use a different one.');
                    window.history.back();
                  </script>";
            return;
        }

        
        // Create user
        $userId = $this->clubModel->createUser($username, $email, $password, $userTypeId);
        if (!$userId) {
            echo "<script>
                    alert('Error: Could not create user.');
                    window.history.back();
                  </script>";
            return;
        }

        // Create club details if userType is "Club & Organization"
        if ($userTypeId == 2) {
            if ($this->clubModel->createClubDetails($userId, $clubName, $clubDescription)) {
                echo "<script>
                        alert('Club created successfully!');
                        window.location.href = '../../app/views/indexForAdmin.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Error: Could not create club details.');
                        window.history.back();
                      </script>";
            }
        } else {
            echo "<script>
                    alert('User created successfully!');
                    window.location.href = '../../app/views/indexForAdmin.php';
                  </script>";
        }
    }
}

// Main Script
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller = new ClubController();
    $controller->handleClubCreation($_POST);


    
    if (isset($result["success"])) {
        echo "<script>
                alert('{$result["success"]}');
                window.location.href = '../../app/views/indexForAdmin.php';
              </script>";
    } else {
        echo "<script>
                alert('{$result["error"]}');
                window.history.back();
              </script>";
    }
}



