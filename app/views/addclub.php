<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Club & Organization - Admin Dashboard</title>
    <?php include '../../app/views/style.php'; ?>
</head>

<body id="top">
    <?php include "navbarForAdmin.php"; ?>
    <main>
        <section class="hero-section">
            <div class="container">
                <h2 class="mb-4">Add Club & Organization</h2>
                <form action="../../app/controller/ClubController.php" method="POST" id="createUserForm">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="ClubAndOrganizationName">Club & Organization Name:</label>
                    <input type="text" id="ClubAndOrganizationName" name="ClubAndOrganizationName" required>

                    <label for="ClubAndOrganizationDescription">Club & Organization Description:</label>
                    <input type="text" id="ClubAndOrganizationDescription" name="ClubAndOrganizationDescription" required>

                    <label for="userType">User Type:</label>
                    <select id="userType" name="userTypeId" required>
                        <option value="2">Club & Organization</option>
                    </select>

                    <button type="submit">Create User</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="index.php">
                        <i class="bi-back"></i>
                        <span>Admin</span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <h6 class="site-footer-title mb-3">Resources</h6>
                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">Home</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">Add Club</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="index.php#activity" class="site-footer-link">Activity</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="reports-detail.php" class="site-footer-link">Reports</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="dashboard-detail.php" class="site-footer-link">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
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
