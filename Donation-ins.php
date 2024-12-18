<?php
require 'config.php';
require 'Login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the incoming JSON request data
    $data = json_decode(file_get_contents('php://input'), true);

    // Retrieve data from request or use defaults
    $name = $_SESSION['name'] ?? $data['fname'] ?? 'Anonymous';
    $email = $_SESSION['email'] ?? $data['email'] ?? 'noemail@example.com';
    $donationAmount = (float)($data['donationAmount'] ?? 0); // Ensure float value for amount
    $mobileNumber = $data['mobile'] ?? null;
    $cnic = $data['cnic'] ?? null;
    $gift = $data['gift'] ?? 'no';
    $support = $data['support'] ?? 'General';
    $paymentMethod = $data['payment_type'] ?? 'cash';
    $time = $data['recurring'] ?? 'one-time';
    $image = $data['timages'] ?? 'default.png';

    // Debugging log
    error_log("Data received: " . print_r($data, true));

    // Prepare the SQL query to insert data
    $sql = "INSERT INTO donate (fname, email, recurring, amount, gift, support, payment_type, timages)
            VALUES ('$name', '$email', '$time', $donationAmount, '$gift', '$support', '$paymentMethod', '$image')";

    try {
        // Execute the query
        if ($connection->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "Donation successfully recorded."]);
        } else {
            // Log any query error
         
            echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
        }

    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
}
?>
