<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Topic Listing Contact Page</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-topic-listing.css" rel="stylesheet">

        <link href="css/signup.css" rel="stylesheet">
<!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
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
                                    <li class="breadcrumb-item"><a href="indexForStudents.php">Homepage</a></li>

                             <li class="breadcrumb-item active" aria-current="page">clubs</li>
                                </ol>
                            </nav>

                            <h2 class="text-white"> MIU CLUBS</h2>
                        </div>

                    </div>
                </div>
            </header>


          <section class="section-padding section-bg" id="signUpSection">
         <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2 class="mb-4 text-center">Add Event</h2>
                <form action="add_event.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="eventName" class="form-label">Event Name</label>
                        <input type="text" class="form-control" id="eventName" name="event_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="eventDiscription" class="form-label">Event Discription</label>
                        <input type="text" class="form-control" id="eventDiscription" name="event-Discription" required>
                    </div>


                    <div class="mb-3">
                        <label for="eventPhoto" class="form-label">Event Photo</label>
                        <input type="file" class="form-control" id="eventPhoto" name="event_photo" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="eventDate" class="form-label">Event Date</label>
                        <input type="date" class="form-control" id="eventDate" name="event_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="eventTime" class="form-label">Event Time</label>
                        <input type="time" class="form-control" id="eventTime" name="event_time" required>
                    </div>

                    <div class="mb-3">
                        <label for="eventLocation" class="form-label">Event Location</label>
                        <input type="text" class="form-control" id="eventLocation" name="event_location" required>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
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