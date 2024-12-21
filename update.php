<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    

    $sql = $connection->prepare("SELECT * FROM donate WHERE Id=:id ");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $donation = $sql->fetch(PDO::FETCH_ASSOC);
    if ($donation){
        $name = $donation['fname'];
        $email = $donation['email'];
        $recurring = $donation['recurring'];
        $amount = $donation['amount'];
        $gift = $donation['gift'];
        $support = $donation['support'];
        $payment_type = $donation['payment_type'];
        $timages = $donation['timages'];
        $status = $donation['Tstatus'];
    }
    else{
        echo "<script>alert('Donation not found')</script>";
        exit;
    }
}
var_dump($_POST);
if ($_SERVER['REQUEST_METHOD']=="POST"){

   $id = $_POST['id'];

    $new_status = $_POST['status'];
   error_log("New Status: $new_status, ID: $id") ;  // Debug output

    $update_stmt = $connection->prepare('UPDATE donate SET Tstatus = :new_status WHERE Id = :id');

    // Bind the parameters (named placeholders)
    $update_stmt->bindParam(':new_status', $new_status, PDO::PARAM_STR); // Binding a string
    $update_stmt->bindParam(':id', $id, PDO::PARAM_INT); // Binding an integer
    
    // Execute the query
    $update_stmt->execute();
   
    if ($update_stmt->execute()){
        echo "<script>alert('Value updated')</script>";
        header('location:donationmanagement.php');
    }
    else{
        echo "<script>alert('Value not updated')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Donation Status</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            color: #333;
            margin-bottom: 30px;
        }

        /* Form Styling */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        .form-container input:focus, .form-container select:focus {
            border-color: #5e72e4;
            outline: none;
        }

        .form-container button {
            padding: 12px 20px;
            background-color: #5e72e4;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #4e61d0;
        }

        .form-container img {
            width: 50px;
            height: 50px;
            margin-bottom: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .form-container .disabled {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }

        /* Form spacing */
        .form-container .form-row {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Update Donation Status</h1>
    
    <div class="form-container">
        <form method="POST" action="update.php">
            <div class="form-row">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id) ?>" >
                <label for="fname">Name:</label>
                <input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($name); ?>" disabled class="disabled"><br><br>
            </div>

            <div class="form-row">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" disabled class="disabled"><br><br>
            </div>

            <div class="form-row">
                <label for="recurring">Recurring:</label>
                <input type="text" name="recurring" id="recurring" value="<?php echo htmlspecialchars($recurring); ?>" disabled class="disabled"><br><br>
            </div>

            <div class="form-row">
                <label for="amount">Amount:</label>
                <input type="text" name="amount" id="amount" value="<?php echo htmlspecialchars($amount); ?>" disabled class="disabled"><br><br>
            </div>

            <div class="form-row">
                <label for="gift">Gift:</label>
                <input type="text" name="gift" id="gift" value="<?php echo htmlspecialchars($gift); ?>" disabled class="disabled"><br><br>
            </div>

            <div class="form-row">
                <label for="support">Support:</label>
                <input type="text" name="support" id="support" value="<?php echo htmlspecialchars($support); ?>" disabled class="disabled"><br><br>
            </div>

            <div class="form-row">
                <label for="payment_type">Payment Type:</label>
                <input type="text" name="payment_type" id="payment_type" value="<?php echo htmlspecialchars($payment_type); ?>" disabled class="disabled"><br><br>
            </div>

            <div class="form-row">
                <label for="timages">Image:</label>
                <img src="<?php echo htmlspecialchars($timages); ?>" alt="Image"><br><br>
            </div>

            <div class="form-row">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="Pending"  <?php echo ($status === 'Pending') ? 'selected' : ''; ?>>Pending</option>
                    <option value="Approved" <?php echo ($status === 'Approved') ? 'selected' : ''; ?>>Approved</option>
                    <option value="Rejected" <?php echo ($status === 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
                </select><br><br>
            </div>

            <button type="submit">Update Status</button>
        </form>
    </div>
</body>
</html>