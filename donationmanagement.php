
<?php
session_start();
require 'config.php';  // Ensure this contains the correct database connection setup.

if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {
    header('Location: login.php');
    exit;
}
$userName = $_SESSION['name'];
$role = '6f9b7e34-a7c2-4e5f-abc1-d78a94f33b12';
if ($_SESSION['role'] !== $role) {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>403 Forbidden</h1>";
    exit;
}
$sql = $connection->prepare('SELECT * FROM donate ');
$sql->execute();
$donations=$sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Management</title>
    <link rel="stylesheet" href="admin.css">
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    .content {
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    #donation-management h1 {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 20px;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    th {
        background-color:#2d3e50;
        font-weight: 600;
        color: white;
    }

    tr:hover {
        background-color: #f8f8fa;
    }

    .status-not-approved {
        color: #d9534f;
        font-weight: 500;
    }

    .status-approved {
        color: #5cb85c;
        font-weight: 500;
    }

    .image-cell {
        text-align: center;
    }

    .image-cell img {
        max-width: 30px;
        height: auto;
        vertical-align: middle;
    }

    @media (max-width: 700px) {
        table {
            font-size: 14px;
        }

        th, td {
            padding: 8px 10px;
        }
    }
</style>
<body>
<div class="admin-panel">
    <aside class="sidebar">
        <h2>Admin Panel: <?php echo $userName ?></h2>
        <nav>
            <ul>
                <li><a href="/Admin.php">Dashboard</a></li>
                <li><a href="#user-management">User Management</a></li>
                <li><a href="/Admin.php#campaign-management">Campaign Management</a></li>
                <li><a href="#donation-management">Donation Management</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </aside>

    <main class="content">
        <section id="donation-management">
            <h1>Donation Management</h1>
            <table class="donations-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Recurring</th>
                        <th>Amount</th>
                        <th>Gift</th>
                        <th>Support</th>
                        <th>Payment Type</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donations as $donation): ?>
                        <tr>
                            <th><?php echo htmlspecialchars($donation['Id']); ?></th>
                            <td><?php echo htmlspecialchars($donation['fname']); ?></td>
                            <td><?php echo htmlspecialchars($donation['email']); ?></td>
                            <td><?php echo htmlspecialchars($donation['recurring']); ?></td>
                            <td><?php echo htmlspecialchars($donation['amount']); ?></td>
                            <td><?php echo htmlspecialchars($donation['gift']); ?></td>
                            <td><?php echo htmlspecialchars($donation['support']); ?></td>
                            <td><?php echo htmlspecialchars($donation['payment_type']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($donation['timages']); ?>" alt="Image" width="50"></td>
                            <td>
                                <?php echo htmlspecialchars($donation['Tstatus']) ?>
                            </td>
                            <td>
                                <input type="checkbox" class="donation-checkbox" value="<?php echo $donation['Id']; ?>">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <br><br><br>
        <!-- Update Button -->
        <button id="update-btn">Update</button>
        <button id="Delete-btn">Delete</button>
    </main>
</div>

<script>
    document.getElementById('update-btn').addEventListener('click', function() {
        var selectedDonations = [];
        document.querySelectorAll('.donation-checkbox:checked').forEach(function(checkbox) {
            selectedDonations.push(checkbox.value);
        });
        if (selectedDonations.length === 0) {
            alert('Please select at least one donation to update.');
            return;
        }
        var url = 'update.php?id=' + selectedDonations.join(',');
        window.location.href = url;
    });
    document.getElementById('Delete-btn').addEventListener('click', function() {
        var selectedDonations = [];
        document.querySelectorAll('.donation-checkbox:checked').forEach(function(checkbox) {
            selectedDonations.push(checkbox.value);
        });
        if (selectedDonations.length === 0) {
            alert('Please select at least one donation to update.');
            return;
        }
        var url = 'deldonation.php?id=' + selectedDonations.join(',');
        window.location.href = url;
    });
</script>

</body>
</html>
