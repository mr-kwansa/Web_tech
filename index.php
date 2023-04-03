<?php include('partials/menu.php')?>
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
            $active = $_POST['active'];
        
            $sql = "INSERT INTO tbl_category (title, image_name, featured,active) VALUES ('$title','$image_name','$featured','$active')";
        
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
            $conn->close();
        }
        
        ?>
    <!--Main content section starts-->
    <div class = "main-content">
        <div class = "wrapper">
            <h1>DASHBOARD</h1>
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
			$sql = "SELECT id, title, image_name, featured,active FROM tbl_category";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// Output data of each row
				while($row = mysqli_fetch_assoc($result)) {
           ?> <div class ="col-4 text-center">
                <h1>5</h1>
                <br>
               <?php echo $row["title"] ?>
            </div>
            <?php
}
} else {
    echo "0 results";
}

mysqli_close($conn);
            ?>
         
            
            <div class="clearfix"></div>
            
        </div>
    </div>
    <!--main content section ends-->
</div>
   <?php include('partials/footer.php') ?>