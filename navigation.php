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
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == '6f9b7e34-a7c2-4e5f-abc1-d78a94f33b12'): ?>
      <div class="nav-button">
        <button onclick="window.location.href = 'Admin.php'">Admin Panel</button>
      </div>
    <?php elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == '18d5ae25-95c4-4336-8637-9ba71b622190'): ?>
      <div class="nav-button">
        <button onclick="window.location.href='user.php'">Dashboard</button>
      </div>
      <?php else: ?>
        <div class="nav-button">
        <button onclick="window.location.href='Login.php'">Donate Now</button>
      </div>
    <?php endif; ?>
      </div>
    </nav>
  </body>
</html>