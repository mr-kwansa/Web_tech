<?php include('partials/menu.php') ?>
    <!--Main content section starts-->
    <div class = "main-content">
        <div class = "wrapper">
            <h1>Food</h1>

            <?php include('add-food.php')?>
        <?php 
        // ----------------------------------------------------------------
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
            $title = $_POST['title'];
            $image_name = $_POST['image_name'];
            $featured = $_POST['featured'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            // $category_id = $_POST['category_id'];
            $active = $_POST['active'];
        
            $sql = "INSERT INTO tbl_food (title, description , price, image_name, featured,active) VALUES ('$title', '$description', '$price','$image_name','$featured','$active')";
        
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
            $conn->close();
        }
        
        ?>
        
            <br><br>

            <br><br>
            <!-- <a href="#" class = "btn-primary">Add Category</a> -->
            <form style="height:10px;" action="food_search.php" class="food_search">
            <input type="text" style="background-color:transparent;" name="food_search"placeholder="search for product">
            <button>Search</button>
            <br><br>
            <table class ="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                <?php
			// Retrieve data from the database and display it in the table
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

			// Retrieve data from the database
			$sql = "SELECT id, title, description, price, image_name, featured,active FROM tbl_food";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// Output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row["id"] . "</td>";
					echo "<td>" . $row["title"] . "</td>";
					echo "<td>". $row["description"]."</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td><img src=". $row["image_name"]."></td>";
                    echo "<td>". $row["featured"]."</td>";
                    echo "<td>". $row["active"]. "</td>";
					echo "<td><a href='updateFood.php?id=" . $row["id"] . "'class='btn-primary'>Update</a> | <a class='btn-secondary1' href='deleteFood.php?id=" . $row["id"] . "'>Delete</a></td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}

			mysqli_close($conn);
		?>
	</table>
            

            
            
        </div>
    </div>
    <!--main content section ends-->
        </div>
   <?php include('partials/footer.php') ?>