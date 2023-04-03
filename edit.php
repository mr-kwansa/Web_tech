
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
<!-- dont f**k up -->

<?php


// Step 4: Display data in a table format
// Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food_order";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM tbl_admin";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Display data in a table format
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td>
        <td>" . $row["full_name"] . "</td>
        <td>" . $row["username"] . "</td>
        <td>";  //   deleting row from the database
                ?>  
                    <a href="#" class = "btn-secondary">update Admin</a>
                   <a href="manage-admin.php" class = "btn-secondary">Delete Admin</a> 
                    </form>
  
                 <?php
     echo "</td>
     </tr>";
     
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

            </table>
            
            
        </div>
    </div>
    <!--main content section ends-->

   <?php include('partials/footer.php') ?>

 