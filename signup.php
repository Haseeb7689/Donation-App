<?php
require "config.php";
session_start(); // Start the session to store session variables

if (isset($_POST['submit'])) {
    if ($_POST['name'] == " " || $_POST['email'] == " " || $_POST['password'] == " ") {
        echo "<script>alert('Please fill out all fields.')</script>";
        echo "<script>window.location='/signup.php'</script>";
    } else {
        $id = uniqid();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = '18d5ae25-95c4-4336-8637-9ba71b622190';
        
        // Hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the database
        $sql = "INSERT INTO register (id, name, email, password, role) VALUES ('$id', '$name', '$email', '$password', '$role')";
        $result = $connection->query($sql);

        if ($result) {
            // Set session variables after successful registration
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;

            echo "<script>alert('Registration successful.')</script>";
            echo "<script>window.location='/login.php'</script>"; // Redirect to profile page (or any other page)
        } else {
            echo "<script>alert('Registration failed.')</script>";
            echo "<script>window.location='/signup.php'</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="img/logo.png" sizes="48x48" type="image/x-icon" />
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <section id="signup">
        <div class="container">
            <div class="signup-section">
                <!-- Left Side: Form -->
                <div class="form_area">
                    <p class="title">Sign Up to Heartly</p>
                    <form action="signup.php" method="post" name="form">
                        <div class="form_group">
                            <label class="sub_title" for="name">Name</label>
                            <input placeholder="Enter your full name" class="form_style" type="text" id="name" name="name">
                        </div>
                        <div class="form_group">
                            <label class="sub_title" for="email">Email</label>
                            <input placeholder="Enter your email" id="email" class="form_style" type="email" name="email">
                        </div>
                        <div class="form_group">
                            <label class="sub_title" for="password">Password</label>
                            <input placeholder="Enter your password" id="password" class="form_style" type="password" name="password">
                        </div>
                        <button class="btn" type="submit" name="submit">Sign Up</button>
                        <p>Have an account? <a class="link" href="/Login.php">Login Here!</a></p>
                    </form>
                </div>
                
                <!-- Right Side: Banner -->
                
            </div>
        </div>
    </section>
    <script src="index.js"></script>
</body>
</html>
