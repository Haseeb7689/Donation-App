<?php
session_start();  // Start the session to access session variables
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/logo.png" sizes="48x48" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />
    <title>Heart Help</title>
  </head>
  <body>
    <nav id="nav">
      <div class="nav">
        <div class="logo">
          <img src="img/logo.png" alt="logo" />
        </div>
        

        <div class="list">
          <ul>
            <li>
              <a href="/index.php" style="text-decoration: none; color: inherit"
                >Home</a
              >
            </li>
            <li>
              <a href="#About" style="text-decoration: none; color: inherit"
                >About us</a
              >
            </li>
            <li>
              <a href="#Projects" style="text-decoration: none; color: inherit"
                >Our Projects</a
              >
            </li>
            <li>
              <a href="#Involved" style="text-decoration: none; color: inherit"
                >Get Involved</a
              >
            </li>
            <li>
              <a href="#Donation" style="text-decoration: none; color: inherit"
                >Donation</a
              >
            </li>
            <li>
              <a href="#Contact" style="text-decoration: none; color: inherit"
                >Contact us</a
              >
            </li>
          </ul>
        </div>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
      <div class="nav-button">
        <button onclick="window.location.href = '/user.php'">Dashboard</button>
      </div>
    <?php else: ?>
      <div class="nav-button">
        <button onclick="Navigate('donate')">Donation Now</button>
      </div>
    <?php endif; ?>
    
      </div>
    </nav>
  </body>
</html>