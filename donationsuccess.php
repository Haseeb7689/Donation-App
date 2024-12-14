<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = $_POST; // JazzCash returns the payment details in POST
    $secureHash = $response['pp_SecureHash'] ?? '';

    // Validate the secure hash
    $merchantId = "MC146119";
    $password = "w8sh0z2400";
    $expectedHash = hash_hmac('sha256', implode('&', [
        $response['pp_TxnRefNo'],
        $response['pp_Amount'],
        $response['pp_BillReference'],
        $password
    ]), $password);

    if ($secureHash === $expectedHash) {
        echo "Payment successful! Transaction Ref No: " . $response['pp_TxnRefNo'];
    } else {
        echo "Payment verification failed!";
    }
} else {
    echo "Invalid request.";
}
?>
