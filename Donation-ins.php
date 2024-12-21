<?php

require 'config.php';
require 'Login.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    // Redirect to login page if the user is not logged in
    header('Location: login.php');
    exit;
}
$name = $_SESSION['name'] ;
$email = $_SESSION['email'] ;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the incoming JSON request data
    $data = json_decode(file_get_contents('php://input'), true);

    // Check for JSON parsing errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("JSON decode error: " . json_last_error_msg());
        echo json_encode(["status" => "error", "message" => "Invalid JSON data"]);
        exit;
    }

    // Retrieve data from request or session (if session is available)
    $donationAmount = (float)($data['donationAmount'] ?? 0); // Ensure float value for amount
    $mobileNumber = $data['mobile'] ?? null;
    $cnic = $data['cnic'] ?? null;
    $gift = $data['gift'] ?? 'no';
    $support = $data['support'] ?? 'General';
    $paymentMethod = $data['payment_type'] ?? 'cash';
    $time = $data['recurring'] ?? 'one-time';
    $image = $data['timages'] ?? 'default.png';
    $status='Not Approved';

    // Debugging log
    error_log("Name: $name, Email: $email, Donation Amount: $donationAmount, Mobile: $mobileNumber, CNIC: $cnic, Gift: $gift, Support: $support, Payment Method: $paymentMethod, Recurring: $time, Image: $image");

    // Prepare the SQL query with placeholders
    $sql = "INSERT INTO donate (fname, email, recurring, amount, gift, support, payment_type, timages, Tstatus)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
if ($stmt = $connection->prepare($sql)) {
// Bind the parameters to the placeholders
$stmt->bindValue(1, $name, PDO::PARAM_STR);
$stmt->bindValue(2, $email, PDO::PARAM_STR);
$stmt->bindValue(3, $time, PDO::PARAM_STR);
$stmt->bindValue(4, $donationAmount, PDO::PARAM_STR); // Using PDO::PARAM_STR for float values
$stmt->bindValue(5, $gift, PDO::PARAM_STR);
$stmt->bindValue(6, $support, PDO::PARAM_STR);
$stmt->bindValue(7, $paymentMethod, PDO::PARAM_STR);
$stmt->bindValue(8, $image, PDO::PARAM_STR);
$stmt->bindValue(9, $status, PDO::PARAM_STR); // Binding the $status variable

// Execute the prepared statement
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Donation successfully recorded."]);
} else {
    error_log("Query Error: " );
    echo json_encode(["status" => "error", "message" => "Database error: " ]);
}

// Close the statement
exit;
} else {
        error_log("Statement preparation failed: " );
        echo json_encode(["status" => "error", "message" => "Database error: " ]);
    }
}

?>
