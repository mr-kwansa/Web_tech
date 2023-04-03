
<?php include('partials/menu.php') ?>
    <!--Main content section starts-->
    <div class = "main-content">
        <div class = "wrapper">
            <h1>Manage Admin</h1>
            <br><br>
            
             <!-- <a href="add-admin.php" class = "btn-primary">Add Admin</a>  -->
             <?php include('add-admin.php')?>
        <?php include('script.php')?>
        
            <br><br>
            <table class ="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Action</th>
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
			$sql = "SELECT id, full_name, username FROM tbl_admin";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// Output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
                    echo "<td>". $row['id']. "</td>";
                    echo "<td>". $row['full_name']. "</td>";
                    //echo "<td>". $row['email']. "</td>";
                    echo "<td>". $row['username']. "</td>";
					echo "<td><a href='updateAdd.php?id=" . $row["id"] . "' class='btn-primary'>Update</a> | <a class='btn-secondary1' href='deleteAd.php?id=" . $row["id"] . "'>Delete</a></td>";
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

 
