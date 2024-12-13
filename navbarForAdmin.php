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

<body id="top" >
   

    <main class="admin">

    <style>
        .admin{
        
            background-color: #80d0c7;
               background-image: linear-gradient(15deg, #80d0c7 0%,  #13547a 100%);
        }
    </style>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="indexForClubsAndOrganizations.php">
                    <i class="bi-back"></i>
                    <span>UniConnect</span>
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="studentorclub.php">Add
                                User</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll"
                                href="#">Activity</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll"
                                href="#">Reports</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll"
                                href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#">About</a>
                        </li>
                    </ul>

                    <div class="d-none d-lg-block">
                        <a href="#" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
                  
                    <a href="logout.php" class="navbar-icon">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </div>
            </div>
        </nav>
    </main>
</body>

</html>