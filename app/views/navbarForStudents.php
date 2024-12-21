<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>UniConnect</title>

    <!-- CSS FILES -->
    <?php include 'style.php'; ?>

</head>
<?php
session_start();
?>


<body id="top">


    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="indexForStudents.php">
                    <i class="bi-back"></i>
                    <span>UniConnect</span>
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="indexForStudents.php #section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="indexForStudents.php#section_2">Most Popular</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="indexForStudents.php#section_3">How it works</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="indexForStudents.php#section_5">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">About</a>
                        </li>

                    </ul>

                    <div class="d-none d-lg-block">
                        <!-- Signup Icon -->

                        <div class="d-none d-lg-block">
                            <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])): ?>
                                <!-- Show user profile button and logout button if the user is logged in -->
                                <a href="userprofile.php?username=<?php echo htmlspecialchars($_SESSION['username']); ?>" id="load-profile-btn">
                                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                                </a>
                                <a href="LandingPage.php" class="btn btn-danger" id="logout-btn">
                                    Logout
                                </a>
                            <?php else: ?>
                                <!-- Show login button if the user is not logged in -->
                                <!-- <a href="../../public/login.php" class="btn btn-primary" id="login-btn">
                                    Login
                                </a> -->
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
    </main>
</body>

</html>