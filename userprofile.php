<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>View Activity - Admin Dashboard</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; 
            font-family: 'Arial', sans-serif;
        }

        /* body {
            background-color: #white;
            color: #333;
            font-size: 16px;
        } */

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Profile Container */
        .profile-container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #80d0c7;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            font-size: 28px;
            font-weight: bold;
            color: #2d3e50;
            margin-bottom: 15px;
            text-align: center;
        }

        .profile-info {
            margin: 10px 0;
            font-size: 18px;
        }

        .profile-info label {
            font-weight: bold;
        }

        .profile-info span {
            font-style: italic;
            color: #555;
        }

        .profile-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .logout-btn {
            background-color: #ff6b6b;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #ff4757;
        }

        /* Events Section */
        .events-section {
            margin-top: 30px;
        }

        .events-section h2 {
            font-size: 24px;
            font-weight: bold;
            color: #2d3e50;
            margin-bottom: 20px;
        }

        .events-list {
            list-style: none;
            padding-left: 0;
        }

        .event-item {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            transition: transform 0.2s ease;
        }

        .event-item:hover {
            transform: translateX(10px);
        }

        .event-details {
            flex: 1;
        }

        .event-details h3 {
            font-size: 22px;
            color: #2d3e50;
            margin-bottom: 10px;
        }

        .event-details p {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .event-details strong {
            color: #007bff;
        }

        /* Error Message */
        .error-message {
            color: #ff6b6b;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
    </style>

    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css" rel="stylesheet">
    
    <!-- jQuery and FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>
</head>
<body>
    <?php
    session_start(); // Start session

    require 'databaseConnection.php'; // Include database connection

    // Initialize variables for user data and error message
    $userData = null;
    $errorMessage = null;

    // Check if a username is passed in the URL and matches the session
    if (isset($_GET['username']) && $_GET['username'] === $_SESSION['username']) {
        $username = $_SESSION['username'];

        // Query to fetch user data
        $query = "SELECT Username, Email, UserId FROM users WHERE Username = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($fetchedUsername, $fetchedEmail, $fetchedId);

            if ($stmt->fetch()) {
                $userData = [
                    'username' => $fetchedUsername,
                    'email' => $fetchedEmail,
                    'id' => $fetchedId
                ];
            } else {
                $errorMessage = "User not found!";
            }
            $stmt->close();
        } else {
            $errorMessage = "Error: " . $conn->error;
        }

        // Fetch registered events for this user
        $registeredEvents = [];
        $eventQuery = "SELECT e.EventId, e.EventName, e.EventDescription, e.EventImage, e.EventTimeSlot, e.EventDate, e.EventLocation, e.ClubName, r.Slot, r.Role 
                       FROM events e
                       INNER JOIN registrations r ON e.EventId = r.EventId
                       WHERE r.UserId = ? 
                       ORDER BY e.EventDate ASC";
        
        if ($stmt = $conn->prepare($eventQuery)) {
            $stmt->bind_param("i", $fetchedId); // Bind userId
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($eventId, $eventName, $eventDescription, $eventImage, $eventTimeSlot, $eventDate, $eventLocation, $clubName, $slot, $role);

            while ($stmt->fetch()) {
                $registeredEvents[] = [
                    'id' => $eventId,
                    'name' => $eventName,
                    'description' => $eventDescription,
                    'image' => $eventImage,
                    'time' => $eventTimeSlot,
                    'date' => $eventDate,
                    'location' => $eventLocation,
                    'club' => $clubName,
                    'slot' => $slot,
                    'role' => $role
                ];
            }
            $stmt->close();
        } else {
            $errorMessage = "Error: " . $conn->error;
        }
    } else {
        $errorMessage = "Access denied. Please log in to view this page.";
        header("Location: login.php");
        exit();
    }
    ?>

    <div class="profile-container">
        <?php if ($userData): ?>
            <h1 class="profile-header">Welcome, <?php echo htmlspecialchars($userData['username']); ?>!</h1>
            <div class="profile-info">
                <label>Email:</label>
                <span><?php echo htmlspecialchars($userData['email']); ?></span>
            </div>
            <div class="profile-info">
                <label>User ID:</label>
                <span><?php echo htmlspecialchars($userData['id']); ?></span>
            </div>
            <div class="profile-buttons">
                <button onclick="location.href='LandingPage.php'" class="logout-btn">Logout</button>
            </div>
            <div class="profile-buttons">
                <button onclick="location.href='indexForStudents.php'" class="logout-btn">Back</button>
            </div>

            <!-- Registered Events Section -->
            <div class="events-section">
                <h2>Your Registered Events</h2>
                <?php if (count($registeredEvents) > 0): ?>
                    <ul class="events-list">
                        <?php foreach ($registeredEvents as $event): ?>
                            <li class="event-item">
                                <div class="event-details">
                                    <h3><?php echo htmlspecialchars($event['name']); ?></h3>
                                    <p><strong>Date:</strong> <?php echo htmlspecialchars($event['date']); ?></p>
                                    <p><strong>Time:</strong> <?php echo htmlspecialchars($event['time']); ?></p>
                                    <p><strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?></p>
                                    <p><strong>Club:</strong> <?php echo htmlspecialchars($event['club']); ?></p>
                                    <p><strong>Slot:</strong> <?php echo htmlspecialchars($event['slot']); ?></p>
                                    <p><strong>Role:</strong> <?php echo htmlspecialchars($event['role']); ?></p>
                                    <p><strong>Description:</strong> <?php echo htmlspecialchars($event['description']); ?></p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No registered events.</p>
                <?php endif; ?>
            </div>

            <!-- Calendar Section -->
            <div class="calendar-section">
                <h2>Your Calendar</h2>
                <div id="calendar"></div> <!-- Calendar will be dynamically populated -->
            </div>

        <?php else: ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>

    <script>
        $(document).ready(function() {
            var events = <?php echo json_encode($registeredEvents); ?>;
            
            var calendarEvents = events.map(function(event) {
                return {
                    title: event.name,
                    start: event.date + "T" + event.time, // Ensure the time is in the correct format
                    description: event.location,
                    url: 'event_details.php?event_id=' + event.id,
                    allDay: true // Optional: Use if you want the event to span the entire day
                };
            });

            $('#calendar').fullCalendar({
                events: calendarEvents,
                eventRender: function(event, element) {
                    element.attr('title', event.description); // Optional: Add description to event's tooltip
                },
                eventColor: '#ff6b6b', // Optional: Add a color to highlight the events
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                }
            });
        });
    </script>
</body>
</html>
