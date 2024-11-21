<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/StudentProfile.css">
</head>
<body>
    <div class="container">
        <!-- Profile Picture Section -->
        <img src="https://via.placeholder.com/120" alt="Profile Picture" class="profile-picture" id="profilePic">
        <br>
        <span class="upload-btn" onclick="document.getElementById('profileInput').click();">Upload New Photo</span>
        <input type="file" id="profileInput" style="display: none;" accept="image/*" onchange="loadProfilePicture(event)">

        <!-- User Information -->
        <div class="info-block">
            <label for="username">Username</label>
            <br>
            <input type="text" id="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : 'username'; ?>">
            <button onclick="editField('username')">✏️</button>
        </div>
        <div class="info-block">
            <label for="email">Email</label>
            <br>
            <input type="email" id="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'email@example.com'; ?>">
            <button onclick="editField('email')">✏️</button>
        </div>

        <!-- Event History Section -->
        <div class="event-history">
            <h3>Event History</h3>
            <div class="event">Event 1 - Date</div>
            <div class="event">Event 2 - Date</div>
            <div class="event">Event 3 - Date</div>
        </div>

        <!-- Dark Mode Toggle -->
        <div class="dark-mode-toggle">
            <input type="checkbox" id="darkModeToggle" onchange="toggleDarkMode()">
            <label for="darkModeToggle">Dark Mode</label>
        </div>
    </div>

    <script>
        // Toggle Dark Mode
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }

        // Edit Field Functionality
        function editField(fieldId) {
            let field = document.getElementById(fieldId);
            field.disabled = !field.disabled;
            field.focus();
        }

        // Load Profile Picture Preview
        function loadProfilePicture(event) {
            let profilePic = document.getElementById('profilePic');
            profilePic.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>
