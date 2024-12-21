<?php

require(__DIR__ . "/../db/Dbh.php");
require(__DIR__ . "/../Model/StudentModel.php");
require(__DIR__ . "/../Model/User.php");



class StudentController
{
    private $dbConnection;
    private $studentModel;
    private $userModel;

    public function __construct()
    {
        $db = new Dbh();
        $this->dbConnection = $db->getConn();
        $this->studentModel = new Student($this->dbConnection);
        $this->userModel = new User($this->dbConnection);
    }

    public function addStudent($postData)
    {
        $username = $postData["username"];
        $email = $postData["email"];
        $password = password_hash($postData["password"], PASSWORD_BCRYPT);
        $userTypeId = $postData["userTypeId"];
        $studentName = $postData["StudentName"] ?? null;
        $gender = $postData["Gender"] ?? null;

        // Validate input
        if (empty($username) || empty($email) || empty($password) || empty($studentName) || empty($gender)) {
            return ["error" => "All fields are required."];
        }

        // Check if user exists
        if ($this->userModel->isUserExists($username, $email)) {
            return ["error" => "Username or Email already exists. Please use a different one."];
        }

        // Create user
        $userId = $this->userModel->createUser($username, $email, $password, $userTypeId);
        if (!$userId) {
            return ["error" => "Error: Could not create user."];
        }

        // Create student if user type is "Student"
        if ($userTypeId == 1) {
            $success = $this->studentModel->createStudent($userId, $studentName, $gender);
            if ($success) {
                return ["success" => "Student created successfully!"];
            } else {
                return ["error" => "Error: Could not create student record."];
            }
        }

        return ["success" => "User created successfully!"];
    }
}

// Main script logic
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller = new StudentController();
    $result = $controller->addStudent($_POST);

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
