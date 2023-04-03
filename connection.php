<?php
// $Username = $_POST['username_log'];
// $email = $_POST['email_log'];
// $Userpassword = $_POST['pass_log'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_order";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>