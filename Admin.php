<?php
session_start();
require 'config.php';

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {
    header('Location: login.php');
    exit;
}

// Admin role
$role = '6f9b7e34-a7c2-4e5f-abc1-d78a94f33b12';

if ($_SESSION['role'] === $role) {
    $userName = $_SESSION['name'];

    try {
        // Query to count total users
        $userCountQuery = 'SELECT COUNT(*) AS total_users FROM donate';
        $userStmt = $connection->query($userCountQuery);
        $userResult = $userStmt->fetch(PDO::FETCH_ASSOC);
        $totalUsers = $userResult['total_users'];

        // Query to calculate total donations
        $donationSumQuery = 'SELECT SUM(amount) AS total_donations FROM donate';
        $donationStmt = $connection->query($donationSumQuery);
        $donationResult = $donationStmt->fetch(PDO::FETCH_ASSOC);
        $totalDonations = $donationResult['total_donations'];

    } catch (PDOException $e) {
        echo "<script>alert('Database Error: " . $e->getMessage() . "')</script>";
        $totalUsers = 0;
        $totalDonations = 0;
    }

} else {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>403 Forbidden</h1>";
    echo "<p>You do not have permission to access this page.</p>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donation Admin Panel</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div class="admin-panel">
      <aside class="sidebar">
        <h2>Admin Panel: <?php echo $userName ?></h2>
     
        <nav>
          <ul>
            <li><a href="#dashboard">Dashboard</a></li>
            <li><a href="#user-management">User Management</a></li>
            <li><a href="#campaign-management">Campaign Management</a></li>
            <li><a href="/donationmanagement.php">Donation Management</a></li>
            <li><a href="#content-management">Content Management</a></li>
            <li><a href="#reports">Reports</a></li>
            <li><a href="index.php">Homepage</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </nav>
      </aside>

      <main class="content">
      <section id="dashboard">
  <h1>Dashboard</h1>
  <div class="stats">
    <div>Total Donations: $<span id="total-donations"><?php echo number_format($totalDonations, 2); ?></span></div>
    <div>Total Donors: <span id="total-donors"><?php echo $totalUsers; ?></span></div>
    <div>Active Campaigns: <span id="active-campaigns">8</span></div>
    <div>Recent Donations:</div>
    <ul id="recent-donations"></ul>
  </div>
</section>

        <section id="user-management">
          <h1>User Management</h1>
          <button>Add User</button>
          <ul id="user-list"></ul>
        </section>

        <section id="campaign-management">
          <h1>Campaign Management</h1>
          <button>Create Campaign</button>
          <ul id="campaign-list"></ul>
        </section>

        <section id="donation-management">
          <h1>Donation Management</h1>
          <ul id="donation-list"></ul>
          <button>Export Data</button>
        </section>

        <section id="content-management">
          <h1>Content Management</h1>
          <form id="content-form">
            <label for="homepage-banner">Homepage Banner:</label>
            <input
              type="file"
              id="homepage-banner"
              name="homepage-banner"
              class="file-input"
            />
            <label for="faq">FAQs:</label>
            <textarea id="faq" name="faq"></textarea>
            <button type="submit">Save</button>
          </form>
        </section>

        <section id="reports">
          <h1>Reports</h1>
          <button>Generate Report</button>
          <div id="report-output"></div>
        </section>

        <section id="settings">
          <h1>Settings</h1>
          <form id="settings-form">
            <label for="site-logo">Site Logo:</label>
            <input
              type="file"
              id="site-logo"
              name="site-logo"
              class="file-input"
            />
            <label for="contact-info">Contact Info:</label>
            <input type="text" id="contact-info" name="contact-info" />
            <label for="payment-gateway">Payment Gateway:</label>
            <input type="text" id="payment-gateway" name="payment-gateway" />
            <button type="submit">Update</button>
          </form>
        </section>
      </main>
    </div>
  </body>
</html>
