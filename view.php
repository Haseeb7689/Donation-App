<?php
session_start();
require "config.php";
// Ensure user is logged in
if ($_SESSION['loggedin'] || isset($_SESSION['loggedin'])) {
    $name = $_SESSION['name'];

    // Adjust the SQL query to properly fetch donations for the logged-in user
    $sql = $connection->prepare("SELECT * FROM donate WHERE fname = :name");
    $sql->bindValue(':name', $name, PDO::PARAM_STR);  // Bind the username parameter to prevent SQL injection
    $sql->execute();

    // Fetch all donation records for the logged-in user
    $donations = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "You must be logged in to view your donations.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Donations</title>
    <link rel="stylesheet" href="user.css">
    <link rel="icon" href="img/logo.png" sizes="48x48" type="image/x-icon" />
    <style>
        /* General body and container styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            font-size: 16px;
            border: 1px solid black;
        }

        /* Table Header Styling */
        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }

     
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }


        td img {
            border-radius: 5px;
            max-width: 50px;
            height: auto;
        }


        .no-donations {
            font-size: 18px;
            color: #666;
            text-align: center;
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
<aside class="sidebar">
            <h2 style="color: #f2f2f2;">User Panel</h2>
            <nav>
                <ul>
                    <li aria-disabled><a href="/user.php#profile" >Profile</a></li>
                    <li><a href="/user.php#recent-activity">Recent Activity</a></li>
                    <li><a href="/user.php#contact-information">Contact Information</a></li>
                    <li><a href="index.php">Homepage</a></li>
                    <li><a href="Donation.php">Donate</a></li>
                    <li><a href="#table"  style="background-color: #ddd; color:#333">View Donations</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>
    <div class="container" id="table">
        <h2>Your Donations</h2>

        <?php if (count($donations) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Donation Amount</th>
                        <th>Gift</th>
                        <th>Support</th>
                        <th>Payment Method</th>
                        <th>Recurring</th>
                        <th>Image</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donations as $donation): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($donation['amount']); ?> dollars</td>
                            <td><?php echo htmlspecialchars($donation['gift']); ?> </td>
                            <td><?php echo htmlspecialchars($donation['support']); ?> </td>
                            <td><?php echo htmlspecialchars($donation['payment_type']); ?> </td>
                            <td><?php echo htmlspecialchars($donation['recurring']); ?> </td>
                            <td><img src="<?php echo htmlspecialchars($donation['timages']); ?>" alt="Image"></td>
                            <td><?php echo htmlspecialchars($donation['Tstatus']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-donations">You have not made any donations yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>
