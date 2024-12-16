<?php
// Headers for security and cross-origin requests
header('Access-Control-Allow-Origin: https://your-trusted-domain.com'); // Replace with your trusted domain
header('X-XSS-Protection: 1; mode=block');

// Generate dynamic transaction details
$orderId = "ORD1" . date('YmdHis');
$ExpiryTime = date('YmdHis', strtotime("+3 hours"));
$TxnDateTime = date('YmdHis');
$_TxnRefNumber = "T" . date('YmdHis');
$_AmountTmp = 1 * 100; // Example amount
$_FormattedAmount = number_format($_AmountTmp, 0, '', '');

// Generate a secure hash for the transaction (replace "YourSecretKey" with your secret key)
$pp_SecureHash = hash('sha256', $orderId . $TxnDateTime . $_AmountTmp . "YourSecretKey");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JazzCash Integration</title>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <!-- Include your JavaScript file if needed -->
    <script src="/path/to/PayChk3Ds-2.0.js"></script>
</head>
<body>
    <form id="onlineform" action="/HPC/action_POST.php" method="POST">
        <div id="JazzCashFields">
            <div id="JazzCashErrorDiv" style="display: none; color: red"></div>
            <div id="JazzCashSuccessDiv" style="display: none; color: green"></div>
        </div>
        <!-- Hidden fields for transaction response -->
        <input type="hidden" id="ResponseCode" name="ResponseCode">
        <input type="hidden" id="ResponseMessage" name="ResponseMessage">
        <input type="hidden" id="pp_RetreivalReferenceNo" name="pp_RetreivalReferenceNo">
        <input type="hidden" id="pp_InstrToken" name="pp_InstrToken">
        <input type="hidden" id="pp_Description" name="pp_Description">
        <input type="hidden" id="pp_TxnRefNo" name="pp_TxnRefNo">
        <input type="hidden" id="pp_Amount" name="pp_Amount">
        <input type="hidden" id="pp_SecureHash" name="pp_SecureHash">
        <!-- Submit button -->
        <input type="submit" value="Submit">
    </form>

    <script type="text/javascript">
        $(document).ready(function () {
            // Prepare the payload for JazzCash
            const pp_payload = {
                pp_IsRegisteredCustomer: "Yes",
                pp_CustomerID: "TestingID",
                pp_CustomerEmail: "test@test.com",
                pp_CustomerMobile: "033456789025",
                pp_MerchantID: "MC0484",
                pp_Password: "89tfat7e74",
                pp_TxnRefNo: <?php echo json_encode($_TxnRefNumber); ?>,
                pp_Amount: <?php echo json_encode($_AmountTmp); ?>,
                pp_TxnCurrency: "PKR",
                pp_TxnDateTime: <?php echo json_encode($TxnDateTime); ?>,
                pp_TxnExpiryDateTime: <?php echo json_encode($ExpiryTime); ?>,
                pp_BillReference: "billRef",
                pp_Description: "Description of transaction",
                pp_SecureHash: <?php echo json_encode($pp_SecureHash); ?>
            };
            // Populate the fields for JazzCash
            populateJazzCashFields(pp_payload);
        });

        // Event listener for response from JazzCash
        window.addEventListener("message", function (event) {
            try {
                const response = JSON.parse(event.data);
                Object.keys(response).forEach(key => {
                    $(`#${key}`).val(response[key]); // Populate fields dynamically
                });
                document.forms[0].submit(); // Submit the form after populating fields
            } catch (e) {
                console.error("Error processing JazzCash response:", e);
            }
        }, false);
    </script>
</body>
</html>
