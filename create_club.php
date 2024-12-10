<?php
include 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and validate form data
    $username = $_POST["username"];
    $email = $_POST["email"] ;
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Secure password hashing
    $userTypeId = $_POST["userTypeId"];

    // Retrieve club/organization-specific data
    $clubAndOrganizationName = $_POST["ClubAndOrganizationName"];
    $clubAndOrganizationDescription = $_POST["ClubAndOrganizationDescription"];

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
                window.history.back();
              </script>";
    } else {
        // Insert new user data into Users table
        $query = "INSERT INTO Users (Username, Email, Password, UserTypeId) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $username, $email, $password, $userTypeId);

        if ($stmt->execute()) {
            // Get the inserted UserId
            $userId = $stmt->insert_id;

            // If the user is a club/organization, insert club data into the ClubsAndOrganizations table
            if ($userTypeId == 2) {
                $clubQuery = "INSERT INTO Clubsandorganizations (UserId, ClubAndOrganizationName, ClubAndOrganizationDescription) VALUES (?, ?, ?)";
                $clubStmt = $conn->prepare($clubQuery);
                $clubStmt->bind_param("iss", $userId, $clubAndOrganizationName, $clubAndOrganizationDescription);


                if ($clubStmt->execute()) {
                    echo "<script>
                            alert('club created successfully!');
                            window.location.href = 'indexForAdmin.php';
                          </script>";
                } else {
                    echo "<script>
                            alert('Error: Could not create club/organization record.');
                            window.history.back();
                          </script>";
                }
                $clubStmt->close();
            } else {
                // Redirect to admin dashboard if not a club/organization
                echo "<script>
                        alert('club created successfully!');
                        window.location.href = 'indexForAdmin.php';
                      </script>";
            }

            $stmt->close();
        } else {
            echo "<script>
                    alert('Error: Could not create club.');
                    window.history.back();
                  </script>";
        }
    }

    $checkStmt->close();
    $conn->close();
}
?>
