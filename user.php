<?php
session_start(); // Start the session to access session variables

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    // Redirect to login page if the user is not logged in
    header('Location: login.php');
    exit;
}

// Access session variables
$userName = $_SESSION['name']; // User's name
$userEmail = $_SESSION['email']; // User's email
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="user-panel">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>User Panel</h2>
            <nav>
                <ul>
                    <li><a href="#profile">Profile</a></li>
                    <li><a href="#recent-activity">Recent Activity</a></li>
                    <li><a href="#contact-information">Contact Information</a></li>
                    <li><a href="index.php">Homepage</a></li>
                    <li><a href="Donation.php">Donate</a></li>
                    <li><a href="View.php">View Donations</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <!-- Profile Section -->
            <section id="profile">
                <h1>Profile</h1>
                <div class="profile-header">
                    <img id="profilePic" src="https://via.placeholder.com/150" alt="User Profile Picture" onclick="document.getElementById('fileInput').click();">
                    <input type="file" id="fileInput" style="display: none;" onchange="uploadProfilePicture(event)">
                    <h2><?php echo $userName; ?></h2>
                    <p><?php echo $userEmail; ?></p>
                </div>
                <div class="profile-details">
                    <div><strong>Occupation:</strong> <span id="Occupation">Software Engineer</span></div>
                    <div><strong>Location:</strong> <span id="Location1">San Francisco, USA</span></div>
                    <div><strong>Bio:</strong> <span id="bio1">Passionate about technology and innovation</span></div>
                    <button class="btn btn-primary" onclick="about_show();">Edit Profile</button>
                </div>
            </section>

            <!-- Recent Activity Section -->
            <section id="recent-activity">
                <h1>Recent Activity</h1>
                <div class="card">
                    <div class="card-header bg-success text-white">Recent Activity</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Joined a webinar on AI and ML <span class="text-muted">2 days ago</span></li>
                            <li class="list-group-item">Published an article on cloud computing <span class="text-muted">1 week ago</span></li>
                            <li class="list-group-item">Completed a certification in Data Science <span class="text-muted">3 weeks ago</span></li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Contact Information Section -->
            <section id="contact-information">
                <h1>Contact Information</h1>
                <div class="card">
                    <div class="card-header bg-info text-white">Contact Information</div>
                    <div class="card-body">
                        <p><strong>Phone:</strong> <span id="phone1">+1 234 567 890</span></p>
                        <p><strong>Email:</strong> <?php echo $userEmail; ?></p>
                        <p><strong>Website:</strong> <span id="website1"><a href="https://johndoe.com" target="_blank">johndoe.com</a></span></p>
                        <p><strong>LinkedIn:</strong> <span id="URL1"><a href="https://linkedin.com/in/johndoe" target="_blank">linkedin.com/in/johndoe</a></span></p>
                        <button class="btn btn-primary" onclick="info_show();">Edit</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
    <script>
        // Function to handle image upload
        function uploadProfilePicture(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const image = new Image();
                    image.src = e.target.result;
                    image.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        const size = 150;
                        canvas.width = size;
                        canvas.height = size;
                        ctx.drawImage(image, 0, 0, size, size);
                        const resizedImageUrl = canvas.toDataURL();
                        localStorage.setItem('profilePicture', resizedImageUrl);
                        document.getElementById('profilePic').src = resizedImageUrl;
                    };
                };
                reader.readAsDataURL(file);
            }
        }

        // Load stored profile picture on page load
        window.onload = function() {
            const storedImage = localStorage.getItem('profilePicture');
            if (storedImage) {
                document.getElementById('profilePic').src = storedImage;
            }
        };
    </script>
</body>
</html>