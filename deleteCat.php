<?php
	// Retrieve the ID of the record to be deleted from the URL parameter
	$id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food_order";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	  }
	  
	  // Delete data from table
	  $sql = "DELETE FROM tbl_category WHERE id=$id";
	  
	  $query_run = mysqli_query($conn, $sql);
	  if($query_run)
	  {
		  $_SESSION['message'] = "Record added successfully";
		  header("Location: manage-category.php");
		  exit(0);
	  }
	  else
	  {
		  $_SESSION['message'] = "Student Not Created";
		  header("Location: manage-category.php");
		  exit(0);
	  }
?>