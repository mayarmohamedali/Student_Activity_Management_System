<?php
include 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Secure password hashing
    $userTypeId = $_POST["userTypeId"];

    // Retrieve student-specific data
    $studentName = $_POST["StudentName"];
    $gender = $_POST["Gender"];

    // Check if the username or email already exists
    $checkQuery = "SELECT * FROM Users WHERE Username = ? OR Email = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // If user already exists
        echo "<script>
                alert('Username or Email already exists. Please use a different one.');
                window.history.back(); // Redirects user back to the previous form page
              </script>";
    } else {
        // Insert new user data into Users table
        $query = "INSERT INTO Users (Username, Email, Password, UserTypeId) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $username, $email, $password, $userTypeId);

        if ($stmt->execute()) {
            // Get the inserted UserId
            $userId = $stmt->insert_id;

            // If the user is a student, insert student data into the Student table
            if ($userTypeId == 1) {
                // Insert into the students table
                $studentQuery = "INSERT INTO students (UserId, StudentName, Gender) VALUES (?, ?, ?)";
                $studentStmt = $conn->prepare($studentQuery);
                $studentStmt->bind_param("iss", $userId, $studentName, $gender); // Bind the UserId, StudentName, and Gender

                if ($studentStmt->execute()) {
                    echo "<script>
                            alert('User created successfully!');
                            window.location.href = 'indexForAdmin.php'; // Redirect to admin dashboard
                          </script>";
                } else {
                    echo "<script>
                            alert('Error: Could not create student record.');
                            window.history.back(); // Redirects user back to the form page
                          </script>";
                }
                $studentStmt->close();
            } else {
                // Redirect to admin dashboard if not a student
                echo "<script>
                        alert('User created successfully!');
                        window.location.href = 'indexForAdmin.php'; // Redirect to admin dashboard
                      </script>";
            }

            $stmt->close();
        } else {
            echo "<script>
                    alert('Error: Could not create user.');
                    window.history.back(); // Redirects user back to the form page
                  </script>";
        }
    }

    $checkStmt->close();
    $conn->close();
}
?>
