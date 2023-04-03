<?php
	// Retrieve the ID of the record to be updated from the URL parameter
	session_start();
	
	$id = $_GET['id'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Retrieve the updated data from the form
        $username = $_POST['username'];
        $full_name = $_POST['full_name'];
        

		// Update the record in the database
		    $servername = "localhost";
            $username1 = "root";
            $password = "";
            $dbname = "food_order";

		// Create connection
		$conn = mysqli_connect($servername, $username1, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

	    $sql = "UPDATE tbl_admin SET full_name ='$full_name', username ='$username' WHERE id=$id";

        $query_run = mysqli_query($conn, $sql);
        if($query_run)
        {
            $_SESSION['message'] = "Record added successfully";
        }
        else
        {
            $_SESSION['message'] = "Student Not Created";
        }
		mysqli_close($conn);
    header("Location: manage-admin.php");
	} else {
		// Retrieve the current data for the record to be updated
		    $servername = "localhost";
            $username1 = "root";
            $password = "";
            $dbname = "food_order";

		// Create connection
		$conn = mysqli_connect($servername, $username1, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT id, full_name, username FROM tbl_admin WHERE id=$id";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			// Display a form with the current data for the record to be updated
			$row = mysqli_fetch_assoc($result);
			$username = $row['username'];
            $full_name = $row['full_name'];
           

			echo "<h1>Update Record</h1>";
			echo "<form action='updateAdd.php?id=$id' method='post'>";
			echo "<label for='username'>username:</label>";
			echo "<input type='text' id='username' name='username' value='$username'><br><br>";
			echo "<label for='description'>Full name:</label>";
            echo "<input type='text' id='username' name='full_name' value='$full_name'><br><br>";
			echo "<input type='submit' value='Update'>";
			echo "</form>";
		} else {
			echo "Record not found";
		}

		mysqli_close($conn);
	}
?>