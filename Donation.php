<?php
require 'navigation.php';

// Function to initiate JazzCash payment
function initiateJazzCashPayment($amount, $orderId, $description) {
  $amount=
    // JazzCash API credentials
    $apiUrl = "https://sandbox.jazzcash.com.pk/ApplicationAPI/API/2.0/Purchase/DoMWalletTransaction"; // Use production URL in live mode
    $merchantId = "MC146119"; // Replace with your Merchant ID
    $password = "w8sh0z2400"; // Replace with your Password
    $returnUrl = "http://localhost:8000//DonationSuccess.php"; // Update with your actual return URL
    $timestamp = date('YmdHis');
    $txnRefNo = "T" . $timestamp;

    // Secure hash generation
    $secureHashData = $merchantId . "&" . $password . "&" . $txnRefNo . "&" . ($amount * 100) . "&" . $password;
    $secureHash = hash_hmac('sha256', $secureHashData, $password);

    // JazzCash API payload
    $payload = [
        "pp_Version" => "2.0",
        "pp_TxnType" => "MWALLET",
        "pp_Language" => "EN",
        "pp_MerchantID" => $merchantId,
        "pp_SubMerchantID" => "",
        "pp_Password" => $password,
        "pp_TxnRefNo" => $txnRefNo,
        "pp_Amount" => $amount * 100, // Amount in paisa
        "pp_TxnCurrency" => "PKR",
        "pp_TxnDateTime" => $timestamp,
        "pp_BillReference" => $orderId,
        "pp_Description" => $description,
        "pp_TxnExpiryDateTime" => date('YmdHis', strtotime('+1 hour')),
        "pp_ReturnURL" => $returnUrl,
        "pp_SecureHash" => $secureHash
    ];

    // Make API request via cURL
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 200) {
        return json_decode($response, true);
    } else {
        return [
            "error" => "Failed to initiate payment",
            "httpCode" => $httpCode,
            "response" => $response
        ];
    }
}

// Handle the form submission for initiating payment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['donationAmount'])) {
    $donationAmount = $_POST['donationAmount'];
    $response = initiateJazzCashPayment($donationAmount, "ORDER12345", "Donation Payment");

    if (isset($response['pp_ResponseCode']) && $response['pp_ResponseCode'] == '000') {
        header("Location: " . $response['pp_RedirectionURL']); // Redirect to JazzCash payment page
        exit;
    } else {
        echo "Error initiating payment: " . ($response['pp_ResponseMessage'] ?? 'Unknown error');
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donation</title>
  <link rel="icon" href="img/logo.png" sizes="48x48" type="image/x-icon" />
  <link href="./Donationpg.css" rel="stylesheet">
  <link href="./style.css" rel="stylesheet">
</head>

<body>
<div class="wrapper" id="wrapper">
  <div class="container">
    <button onclick="DisplayQR()" style="position: absolute; top: 20px; right: 20px; background: red; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer;">Close</button>
    <img src="./img/BankQR.jpg" alt="QR Code" id="qr-code">
  </div>
</div>

 
  <section id="Banner">
    <div class="banner">
      
    </div>
  </section>
  <section id="donation">
    <div class="donation_Block">
      <div class="donation1">
        <h1>Support Us with <br><span>Donation</span> & <br><span>Supplies</span></h1>
      </div>
      <div class="donation2">
        <p>
          Your donation and supply contributions empower our mission to bring
          vital resources to those in need. Every gifts, whether funds or
          essential items like school supplies and hygiene products, directly
          supports our program and transforms lives. Join us in creating
          lasting change. Thank you for making a difference
        </p>
        <button onclick="Navigate1();">Donate</button>
        <button onclick="NavigatetoShop();">Supplies</button>
      </div>
    </div>
  </section>
  <section id="Donate">
    <div class="banner">
    </div>
    <div class="donation" id="Donation">
      <div class="feedback">
        <button>My Donation</button>
        <button disabled>Payment Type</button>
        <button disabled>Payment detail</button>
      </div>
      <div class="MyDonation">
        <div class="Mode">
          <button onclick="OneTime();" id="OneTime">One Time</button>
          <button onclick="Monthly(); " id="Monthly">Monthly</button>
        </div>
        <div class="amount">
          <button value="100" id="100$" onclick="amount();">100$</button>
          <button value="75"  id="75$" onclick="amount1();">75$</button>
          <button  value="50" id="50$" onclick="amount2();">50$</button>
          <button  value="25" id="25$" onclick="amount3();">25$</button>
          <input type="number" id="other" placeholder="Other amount" id="amount" name="amount" onchange="amount4();"/>
        </div>
        <label>Note: 10$ is the minimum for online donation</label>
      </div>
      <div class="gift">
        <input type="checkbox" id="gift" name="gift" value="gift" />
        <label for="gift">
          Please make my gift go further by adding $1.88 to cover the processing fees and other expenses associated with my donation
        </label>
      </div>
      <div class="support">
        <p>I want to support</p>
        <select>
          <option value="Disaster Relief">Disaster relief</option>
          <option value="Education">Education</option>
          <option value="Healthcare">Healthcare</option>
          <option value="Shelter">Shelter</option>
          <option value="Hunger">Hunger</option>
          <option value="Water">Water</option>
          <option value="Child" selected>Child</option>
        </select>
      </div>
      <div class="submit">
        <button onclick="Popup();">Submit</button>
      </div>
    </div>
    <div class="Payment" id="Payment">

      <div class="feedback">
        <button onclick="Donation();">My Donation</button>
        <button >Payment Type</button>
        <button disabled>Payment detail</button>
      </div>
      <div class="Payment-label">
        <h1>Payment Type</h1>
      </div>
      <div class="Type">

        <button onclick="popup1();">Card</button>
        <button onclick="popup2();">Online Transfer</button>
      </div>
      <br><br><br><br>
    </div>
    <div class="details" id="details">
      <div class="feedback">
        <button  onclick="Donation();">My Donation</button>
        <button  onclick="Payment();">Payment Type</button>
        <button >Payment detail</button>
      </div>
      <div class="Payment-details">
        <div class="name">
          <div class="form-group">
          <label>
            First Name
          </label><br>
          <input type="text" placeholder="Name on the card">
          </div>
          
          <div class="form-group">
          <label> Bank Name</label><br>
          <input type="text" placeholder="Bank Name">
            </div>  
        </div>
        <div class="main-info">
        <div class="form-group1">
        <label>Account Number</label><br>
        <input type="text" placeholder="Account Number">
            </div>        
          <div class="form-group1-2">
          <label>CVV</label><br>
          <input type="number" placeholder="CVV">
            </div>    
          <div class="form-group1-3">
          <label>Expiry Date</label><br>
          <input type="date" placeholder="Expiry Date">
            </div>   
        </div>
        <div class="submit1">
        <button>Submit</button>
        </div>
      </div>
    </div>
    <div class="onlineDetails" id="onlineDetails">
    <div class="feedback">
        <button  onclick="Donation();">My Donation</button>
        <button  onclick="Payment();">Payment Type</button>
        <button >Payment detail</button>
      </div>
      <div class="wallet">
        <label> Enter Your jazzcash number</label>
        <input type="text" id="jazzcash" >
        <input type="submit" value="Submit" onclick="initiateJazzCashPayment();">
        <h1>Online Transfer</h1>
        <p>Make your donation by sending it to the following wallet address</p>
        <div class="wallet-address">
          <p>Wallet Name: Easypaisa</p>
          <p>Account title: Abdur Rehman Abid</p>
          <p>03143241469</p>
          <button>Copy</button>
        </div>
        <div class="wallet-address">
        <p>Wallet Name: Jazz Cash</p>
        <p>Account title: Abdur Rehman Abid</p>
        <p>03143241469</p>
          <button>Copy</button>
        </div>
      </div>
      <div class="Bank">
        <h1>Bank Details</h1>
        <p>Make your donation by sending it to the following wallet address</p>
        <div class="Bank-address">
          <p>Account title: Abdur Rehman Abid</p>
          <p>Bank Name: Allied bank</p>
          <p>Account Number: 08090010117093690010</p>
          <button onclick="DisplayQR();">QR Code</button>
        </div>
      </div>
      <div class="File-upload">
  <h1>File Upload</h1>
  <label class="custum-file-upload" for="file">
    <div class="icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M10 1C9.735 1 9.48 1.105 9.293 1.293L3.293 7.293C3.105 7.48 3 7.735 3 8V20C3 21.657 4.343 23 6 23H7C7.552 23 8 22.552 8 22C8 21.448 7.552 21 7 21H6C5.448 21 5 20.552 5 20V9H10C10.552 9 11 8.552 11 8V3H18C18.552 3 19 3.448 19 4V9C19 9.552 19.448 10 20 10C20.552 10 21 9.552 21 9V4C21 2.343 19.657 1 18 1H10ZM9 7H6.414L9 4.414V7ZM14 15.5C14 14.119 15.119 13 16.5 13C17.881 13 19 14.119 19 15.5V16V17H20C21.105 17 22 17.895 22 19C22 20.105 21.105 21 20 21H13C11.895 21 11 20.105 11 19C11 17.895 11.895 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.208 12.814 12.016 15.122C10.283 15.561 9 17.131 9 19C9 21.209 10.791 23 13 23H20C22.209 23 24 21.209 24 19C24 17.131 22.718 15.561 20.984 15.122C20.792 12.814 18.858 11 16.5 11Z" />
      </svg>
    </div>
    <div class="text">
      <span id="fileName">Click to upload an image</span>
    </div>
    <input type="file" id="file" required onchange="updateFileName()">
  </label>
  <p class="note">Note: Please upload an image file no larger than 5MB.</p><br>
  <p class="note">Upload the Screenshot of the donation receipt for updates</p>
</div>
  <div class="submit1">
        <button>Submit</button>
        </div>
    </div>
  </section>

  <br><br><br><br><br>
  <div class="cards">

    <img src="./img/AmericanExp.webp" alt="logos" id="accepted-cards" />
    <img src="./img/Gpay.png" alt="logos" id="accepted-cards" />
    <img src="./img/masterCard.webp" alt="logos" id="accepted-cards" />
    <img src="./img/visa.png" alt="logos" id="accepted-cards" />


  </div>



  <section id="Contact" class="Contact">
    <div class="contact-main">
      <div class="contact-logo">
        <img src="img/logo.png" alt="" />
        <span style="color: white; font-weight: bold">Follow us</span>
        <div class="contact-socials">
          <a
            href="https://www.facebook.com/abdullah.abdulrehman.3910?mibextid=ZbWKwL"><img src="icons/facebook-yellow.svg" alt="" /></a>
          <a href="https://www.instagram.com/hasi._.oo?igsh=d205cmUwaDhhYjVk"><img src="icons/instagram-yellow.svg" alt="" /></a>
          <a href="twitter.com"><img src="icons/twitter-yellow.svg" alt="" /></a>
          <a href="https://github.com/Haseeb7689"><img src="icons/github-yellow.svg" alt="" /></a>
        </div>
      </div>
      <div class="contact-list">
        <h1>Company</h1>
        <ul>
          <li>
            <a href="#Home" style="text-decoration: none; color: inherit">Home</a>
          </li>
          <li>
            <a href="#About" style="text-decoration: none; color: inherit">About us</a>
          </li>
          <li>
            <a href="#Projects" style="text-decoration: none; color: inherit">Our Projects</a>
          </li>
          <li>
            <a href="#Involved" style="text-decoration: none; color: inherit">Get Involved</a>
          </li>
          <li>
            <a href="#Donation" style="text-decoration: none; color: inherit">Donation</a>
          </li>
          <li>
            <a href="#Contact" style="text-decoration: none; color: inherit">Contact us</a>
          </li>
        </ul>
      </div>
      <div class="contact-links">
        <h1>Links</h1>
        <a href="mailto: battlemani790@gmail.com">
          <img src="icons/email.svg" alt="" />
          battlemani790@gmail.com
        </a>

        <a href="tel:+923109306567"><img src="icons/phone.svg" alt="" />+923109306567</a>
        <a><img src="icons/location.svg" alt="" />Location</a>
      </div>
      <div class="contact-button">
        <h1>SUBSCRIBE</h1>
        <div class="content-button-input">
          <input type="email" placeholder="Enter you email" /><button>
            Sign Up
          </button>
        </div>
      </div>
    </div>

    <hr style="margin: 0px 100px 0px 100px" />
    <p style="color: aliceblue">
      Global Hygiene initiative &copy; Copyright 2024, All Rights Reserved by
      TrioDevelopers.com
    </p>
  </section>
  <script src="index.js"></script>
</body>

</html>