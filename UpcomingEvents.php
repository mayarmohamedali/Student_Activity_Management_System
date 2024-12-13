<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Topic Listing Contact Page</title>
      
        <?php include 'style.php'; ?>

    </head>
    
    <body class="topics-listing-page" id="top">

        <main>
        <?php include"navbarForClubsAndOrganizations.php";?>
           


            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Homepage</a></li>

                             <li class="breadcrumb-item active" aria-current="page">clubs</li>
                                </ol>
                            </nav>

                            <h2 class="text-white">MUN club</h2>
                        </div>

                    </div>
                </div>
            </header>

            <section class="section-padding section-bg" id="signUpSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Upcoming Events</h2>
            </div>

            <!-- Event Card 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card event-card">
                    <img src="images/event1.jpg" class="card-img-top" alt="Event 1">
                    <div class="card-body">
                        <h5 class="card-title">Event Name 1</h5>
                        <p class="card-text"><strong>Date:</strong> March 15, 2024</p>
                        <p class="card-text"><strong>Time:</strong> 3:00 PM</p>
                        <p class="card-text"><strong>Location:</strong> University Hall A</p>
                        <a href="register.html" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card event-card">
                    <img src="images/event2.jpg" class="card-img-top" alt="Event 2">
                    <div class="card-body">
                        <h5 class="card-title">Event Name 2</h5>
                        <p class="card-text"><strong>Date:</strong> April 10, 2024</p>
                        <p class="card-text"><strong>Time:</strong> 5:00 PM</p>
                        <p class="card-text"><strong>Location:</strong> Auditorium</p>
                        <a href="register.html" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>

            <!-- Add more event cards as needed -->
        </div>
    </div>
</section>


        </main>

        
        <?php include"footer.php";?>
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/signup.js"></script>
    </body>
</html>