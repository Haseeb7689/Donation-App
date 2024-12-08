<?php
 require "config.php"; 

 if (isset($_POST['login'])){
    if($_POST['email'] == '' || $_POST['password'] == ''){
       echo "<script>Alert('Please fill out all fields')</script>";
    }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $stm = $connection->prepare("SELECT * FROM register WHERE email = :email");
        
        // Bind the email parameter
        $stm->bindValue(':email', $email, PDO::PARAM_STR);
        $stm->execute();
        $user = $stm->fetch(PDO::FETCH_ASSOC);
        
        if ($user){
            if(password_verify($password, $user['password'])){
                session_start();
                $_SESSION['name'] = $user['name'];
                $_SESSION['loggedin']=true;
                echo '<script>alert("Login Successful")</script>';
                echo '<script>window.location.href="user.php"</script>';
                exit;
            }
        else{
            echo '<script>alert("Password does not match")</script>';
            echo '<script>window.location.href="login.php"</script>';
            exit;
        }
          
        }
        else{
            echo '<script>alert("Login Failed")</script>';
            echo '<script>window.location.href="login.php"</script>';
            exit;
        }
    }





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <!-- Left Section -->
        <div class="form-container">
            <h2 class="form-title">Sign in to Heartly</h2>
            <form action="Login.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="forgot-password">
                    <a href="/forgot-password">Forgot password?</a>
                </div>
                <button type="submit" class="btn-login" name="login">Log in to Heartly</button>
                <p class="create-account">
                    Don't have an account? <a href="signup.php">Create Account</a>
                </p>
            </form>
        </div>

        <!-- Right Section -->
        <div class="info-container">
            <div class="img">
                <div class="wrap"></div>
                <img src="img/Edhi.png" alt="Image" width="100%" height="90%">
            </div>
            <div class="info-content">
                <p class="quote">"Your small act of kindness can change someone's world."</p>
                <p class="description">"Together, we make the world brighter. Log in and start giving."</p>
                <a href="https://wa.me/+923143241469?text=Hello%20I%20want%20to%20donate" class="whatsapp-btn">
                    <img src="img/whatsapp1.png" alt="WhatsApp Icon" > Click to Chat
                </a>
            </div>
        </div>
    </div>
</body>
</html>
<?php


?>