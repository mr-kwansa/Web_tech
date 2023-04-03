<?php
    // include ('connection.php');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food_order";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // $con->select_db("group10webproject");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/loginModal.css">
    <link rel="stylesheet" href="styles/registerModal.css">
	<link rel="stylesheet" href="styles/product.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Category</title>
    <style>
        img{
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <!-- <header class="header_container">
        <h1>TITLE</h1>
        
    </header>
    <nav class="nav_component">
        <h3 style="margin-right:auto;"></h3>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li id="categoryBtn">
              <a href="#">Category</a>
              <ul style="z-index: 1" class="submenu">
                <li><a href="shoes.php">Shoes</a></li>
                <li><a href="perfumes.php">Perfumes</a></li>
                <li><a href="bags.php">Bags</a></li>
                <li><a href="clothes.php">Clothes</a></li>
              </ul>
            </li>
          </ul>
    </nav>
    <section> -->
    <?php 
        $query = $_GET['search'];

        $query = filter_var($query, FILTER_SANITIZE_STRING);
        if(!$query){
            die("invalid search query");
        }
            
            $sql = "SELECT * FROM tbl_category WHERE title LIKE '%$query%'";
            $result = mysqli_query($conn,$sql);
            echo ' <table class ="tbl-full">';
                  echo '<tr>';
                   echo '<th>ID</th>';
                   echo '<th>Title</th>';
                   echo '<th>Image</th>';
                   echo '<th>Featured</th>';
                   echo '<th>Active</th>';
                   echo'<th>Actions</th>';

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                echo'</tr>';
                    echo "<tr>";
					echo "<td>" . $row["id"] . "</td>";
					echo "<td>" . $row["title"] . "</td>";
					echo "<td><img  src=". $row["image_name"]."></td>";
                    echo "<td>" . $row["featured"] . "</td>";
                    echo "<td>". $row["active"]. "</td>";
					echo "<td><a href='updateCat.php?id=" . $row["id"] . "'class='btn-primary'>Update</a> | <a class='btn-secondary1'href='deleteCat.php?id=" . $row["id"] . "'>Delete</a></td>";
					echo "</tr>";
                    
                }
                echo'</table>';
            } else{
                echo 'no items found';
            }
    
    ?>
    </section>

</body>