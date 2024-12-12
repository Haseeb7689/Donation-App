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

<!-- Your HTML code to display the user's profile -->







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png" sizes="48x48" type="image/x-icon" />
    <link rel="stylesheet" href="user.css">
</head>
<body>
  <div class="btn">
    <a href="logout.php" class="btn btn-danger">logout</a>
  </div>
  <div class="btn">
    <a href="index.php" class="btn btn-danger px-4">Home</a>
  </div>
  <div class="btn">
    <a href="Donation.php" class="btn btn-danger px-4">Donate</a>
  </div>
  <div class="btn">
    <a href="View.php" class="btn btn-danger px-4">Donations</a>
  </div>
  <div class="btn">
    <a  class="btn btn-primary btn-outline-dark px-4">Update</a>
  </div>
    <div class="container">
        <!-- Profile Header -->
        <div class="profile-header">
    <img id="profilePic" src="https://via.placeholder.com/150" alt="User Profile Picture" onclick="document.getElementById('fileInput').click();">
    <input type="file" id="fileInput" style="display: none;" onchange="uploadProfilePicture(event)">
    <h1><?php echo $_SESSION['name']; ?></h1>
    <p><?php echo $_SESSION['email']; ?></p>
</div>
        <!-- Profile Body -->
        <div class="profile-body">
            <div class="row">
                <!-- About Section -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">About</div>
                        <div class="card-body">
                            <p><strong>Name:</strong> <?php echo $_SESSION['name'] ?></p>
                            <p><strong>Occupation:</strong> <span  id="Occupation">Software Engineer</span></p>
                            <p ><strong>Location:</strong> <span id="Location1"> San Francisco, USA</span></p>
                            <p><strong>Bio:</strong> <span  id="bio1">Passionate about technology and innovation</span>.</p>
                            <button type="button" class="btn btn-primary" onclick="about_show();">Edit Profile</button>
                        </div>
                    </div>
                    <!-- This IS going to be hidden CARD BODY -->
                    <div class="card " id="hidden">
                        <div class="card-header bg-danger text-white">Edit</div>
                        <div class="card-body">
                            <label for="occupation">Occupation</label>
                            <input id="occupation" type="text" placeholder="Occupation">
                            <br><br>
                            <label for="Location">Location</label>
                            <input id="Location" type="text" placeholder="Location">
                            <br><br>
                            <label for="bio">Bio</label>
                            <input id="bio" type="text" placeholder="Bio"><br><br>
                            <button type="button" class="btn btn-primary" id="save" onclick="Changeinfo();">Save</button>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="col-lg-8">
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
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card">
                <div class="card-header bg-info text-white">Contact Information
                <button type="button" class="btn btn-primary btn-outline-light float-end" onclick="info_show(); ">Edit</button>
                </div>
                <div class="card-body">
                    <p><strong>Phone:</strong> <span id="phone1">+1 234 567 890</span></p>
                    <p><strong>Email: </strong><?php echo $_SESSION['email']; ?></p>
                    <p><strong>Website: </strong><span id="website1"><a href="https://johndoe.com" target="_blank">johndoe.com</a></span> </p>
                    <p><strong>LinkedIn: </strong><span id="URL1"><a href="https://linkedin.com/in/johndoe" target="_blank">linkedin.com/in/johndoe</a></span> </p>
                    
                </div>
            </div>
            <div class="card" id="hidden1">
                <div class="card-header bg-danger text-white">Contact Information</div>
                <div class="card-body">
                    <label for="phone">Phone No</label>
                    <input id="phone" type="text" placeholder="Phone No">
                    <br><br>
                    <label for="website">Website</label>
                    <input id="website" type="text" placeholder="Website Link">
                    <br><br>
                    <label for="URL">Url</label>
                    <input id="URL" type="text" placeholder="Linkedin Profile">
                    <br><br>
                    <button type="button" class="btn btn-primary btn-outline-dark" onclick="ChangeContact();">Save</button>
                </div>
            </div>
        </div>
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
                // Resize the image to fit the container (150x150 px)
                const image = new Image();
                image.src = e.target.result;
                image.onload = function() {
                    // Create a canvas to resize the image
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    const size = 150; // Resize to 150x150 px
                    canvas.width = size;
                    canvas.height = size;
                    ctx.drawImage(image, 0, 0, size, size);

                    // Convert the resized image to a data URL and store it in localStorage
                    const resizedImageUrl = canvas.toDataURL();
                    localStorage.setItem('profilePicture', resizedImageUrl);

                    // Set the profile image to the selected one
                    document.getElementById('profilePic').src = resizedImageUrl;
                };
            };

            reader.readAsDataURL(file); // Read the selected file
        }
    }

    // On page load, check if there is a stored profile picture and display it
    window.onload = function() {
        const storedImage = localStorage.getItem('profilePicture');
        if (storedImage) {
            document.getElementById('profilePic').src = storedImage;
        }
        downloadFromLocalstorage();
        downloadFromLocalstorage1();
    };
</script>
</body>
</html>
