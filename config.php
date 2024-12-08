<?php 
// Database Configuration
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'donation');

$host="localhost";
$user="root";
$pass="";
$db="donation";

// Create Connection
// $connection = mysqli_connect($host, $user, $pass, $db);
$connection = new PDO("mysql:host=$host;dbname=$db", $user, $pass);


// Check Connection
// if (!$connection) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// else{
//      echo "Connected successfully";
// }
?>