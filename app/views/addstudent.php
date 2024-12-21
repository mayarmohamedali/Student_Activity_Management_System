<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Student</title>

    <!-- CSS FILES -->        
    <?php include '../../app/views/style.php'; ?>     
</head>
<body id="top">
<?php include "navbarForAdmin.php"; ?>
<main>
    <section class="hero-section">
        <div class="container">
            <h2 class="mb-4">Add Student</h2>

            <!-- The form sends POST data to the StudentController.php -->
            <form action="../../app/controller/StudentController.php" method="POST" id="createUserForm">
                <label for="StudentName">Student Name:</label>
                <input type="text" id="StudentName" name="StudentName" required>

                <label for="Gender">Gender:</label>
                <select id="Gender" name="Gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br><br>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <label for="userTypeId">User Type:</label>
                <select id="userTypeId" name="userTypeId" required>
                    <option value="1">Student</option>
                </select>

                <button type="submit">Create User</button>
            </form>
        </div>
    </section>
</main>
<footer class="site-footer section-padding">
    <div class="container">
        <!-- Footer content -->
    </div>
</footer>
<script>
document.getElementById("createUserForm").addEventListener("submit", function (e) {
    const password = document.getElementById("password").value;
    if (password.length < 6) {
        e.preventDefault();
        alert("Password must be at least 6 characters long.");
    }
});
</script>
</body>
</html>
