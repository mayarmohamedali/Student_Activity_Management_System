<?php
class DatabaseConnection {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        include 'databaseConnection.php';
        $this->conn = $conn; // Assuming $conn is created in databaseConnection.php
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

class User {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function isUserExists($username, $email) {
        $query = "SELECT * FROM Users WHERE Username = ? OR Email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $exists = $result->num_rows > 0;
        $stmt->close();
        return $exists;
    }

    public function createUser($username, $email, $password, $userTypeId) {
        $query = "INSERT INTO Users (Username, Email, Password, UserTypeId) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $username, $email, $password, $userTypeId);
        $success = $stmt->execute();
        $userId = $stmt->insert_id;
        $stmt->close();
        return $success ? $userId : false;
    }
}

class Student {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function createStudent($userId, $studentName, $gender) {
        $query = "INSERT INTO students (UserId, StudentName, Gender) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iss", $userId, $studentName, $gender);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}

class UserController {
    private $user;
    private $student;

    public function __construct($dbConnection) {
        $this->user = new User($dbConnection);
        $this->student = new Student($dbConnection);
    }

    public function handleUserCreation($postData) {
        $username = $postData["username"];
        $email = $postData["email"];
        $password = password_hash($postData["password"], PASSWORD_BCRYPT);
        $userTypeId = $postData["userTypeId"];
        
        $studentName = $postData["StudentName"] ?? null;
        $gender = $postData["Gender"] ?? null;

        if ($this->user->isUserExists($username, $email)) {
            echo "<script>
                    alert('Username or Email already exists. Please use a different one.');
                    window.history.back();
                  </script>";
            return;
        }

        $userId = $this->user->createUser($username, $email, $password, $userTypeId);
        if (!$userId) {
            echo "<script>
                    alert('Error: Could not create user.');
                    window.history.back();
                  </script>";
            return;
        }

        if ($userTypeId == 1 && $studentName && $gender) {
            if ($this->student->createStudent($userId, $studentName, $gender)) {
                echo "<script>
                        alert('User created successfully!');
                        window.location.href = 'indexForAdmin.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Error: Could not create student record.');
                        window.history.back();
                      </script>";
            }
        } else {
            echo "<script>
                    alert('User created successfully!');
                    window.location.href = 'indexForAdmin.php';
                  </script>";
        }
    }
}

// Main Script
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dbConnection = new DatabaseConnection();
    $controller = new UserController($dbConnection->getConnection());
    $controller->handleUserCreation($_POST);
    $dbConnection->closeConnection();
}
?>
