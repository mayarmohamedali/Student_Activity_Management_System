<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>View Activity - Admin Dashboard</title>

    <!-- CSS FILES -->        
    <?php include 'style.php'; ?>        
</head>

<body id="top">
<main>



    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="indexForAdmin.php">
                <i class="bi-back"></i>
                <span>UniConnect</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                        <a class="nav-link" href="index.php#activity">Add user</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#activity">Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports-detail.php">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-detail.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h2 class="mb-4">Add Club & Organization</h2>
           
           
            <form action="create_club.php" method="POST" id="createUserForm">

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
</body>
<style>
        /* General form styling */
        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        /* Form elements layout */
        label, input, button {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }

        /* Input and button styling */
        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

       button {
    background-color: #4CAF50;
    color: white;
    border: none;
    margin: 10px auto; /* Center the button horizontally */
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
    display: block; /* Ensures the button is treated as a block element */
    text-align: center; /* Ensures text inside the button is centered */
}

        button:hover {
            background-color: #45a049;
        }

        /* Center align the form */
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
<script >
    document.getElementById("createUserForm").addEventListener("submit", function (e) {
    const password = document.getElementById("password").value;
    if (password.length < 6) {
        e.preventDefault();
        alert("Password must be at least 6 characters long.");
    }
});

</script>

            </div>
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
                        <a href="index.php" class="site-footer-link">Add user</a>
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

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


