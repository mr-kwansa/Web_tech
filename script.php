<?php
// Step 1: Check if form is submitted
if (isset($_POST['submit'])) {

    // Step 2: Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food_order";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 3: Insert data into the database
    $username = $_POST['username'];
    $full_name = $_POST['full_name'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tbl_admin (full_name, username, password) VALUES ('$full_name','$username','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>
