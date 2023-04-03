<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            background-color: #ff4757;
            width: 50%;
            margin-left: 400px;
            border-radius: 5px;
        }
        h1, .update{
            padding-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
       
    </style>
</head>
<body>
<h1>Update Record</h1>
<div class="update">
<?php
session_start();
// Retrieve the ID of the record to be updated from the URL parameter
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the updated data from the form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_name = $_POST['image_name'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // Update the record in the database
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

    $sql = "UPDATE tbl_food SET title='$title', description='$description', price='$price', image_name='$image_name', featured='$featured', active='$active' WHERE id=$id";

    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
        $_SESSION['message'] = "Record updated successfully";
    } else {
        $_SESSION['message'] = "Record not updated";
    }
    mysqli_close($conn);
    header("Location: manage-food.php");
} else {
    // Retrieve the current data for the record to be updated
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

    $sql = "SELECT id, title, description, price, image_name, featured, active FROM tbl_food WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Display a form with the current data for the record to be updated
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];

       
        echo "<form action='updatefood.php?id=$id' method='post'>";
        echo "<label for='title'>Title:</label>";
        echo "<input type='text' id='title' name='title' value='$title'><br><br>";
        echo "<label for='description'>Description:</label>";
        echo "<textarea id='description' name='description'>$description</textarea><br><br>";
        echo "<label for='price'>Price:</label>";
        echo "<input type='number' id='price' name='price' value='$price'><br><br>";
        echo "<label for='image_name'>Image Name:</label>";
        echo "<input type='file' id='image_name' name='image_name' value='$image_name'><br><br>";
        echo "<label for='featured'>Featured:</label>";
        echo "<input type='text' id='featured' name='featured' value='$featured'><br><br>";
        echo "<label for='active'>Yes</label>";
            echo "<input type='radio' id='action' name='active' value='$active'><br><br>";
            echo "<label for='aactive'>No</label>";
            echo "<input type='radio' id='active' name='active' value='$active'><br><br>";

			echo "<input type='submit' value='Update'>";
			echo "</form>";
		} else {
			echo "Record not found";
		}

		mysqli_close($conn);
	}
?>
</div>
</body>
</html>

