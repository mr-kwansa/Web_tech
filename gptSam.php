```
<?php

//connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//get the id of the row to be deleted
$id = $_GET['id'];

//sql query to delete row from database
$sql = "DELETE FROM table_name WHERE id = $id";

//execute query and check if successful
if ($conn->query($sql) === TRUE) {
    echo "Row deleted successfully";
} else {
    echo "Error deleting row: " . $conn->error;
}

//close database connection
$conn->close();

?>


<!-- delete -->
```
<?php 
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $sql = "DELETE * FROM table_name WHERE id = $id";
        $result = $conn->query($sql);

        //sfgdthdtf
    //     if ($result->num_rows > 0) {
    //         // Display data in a table format
            
    //         while ($row = $result->fetch_assoc()) {
    //             echo "<tr><td>" . $row["id"] . "</td><td>" . $row["full_name"] . "</td><td>" . $row["username"] . "</td><td>";
    //          ?>
    //                       <?php 
    //                     //   deleting row from the database
    //                       ?>
    <!-- //                         <a href="#" class = "btn-secondary">update Admin</a>
    //                         <a href="#" class = "btn-secondary1">delete Admin</a> -->
                            
    //             <?php
    //          echo "</td></tr>";
             
    //         }
    //         echo "</table>";
    //     } else {
    //         echo "0 results";
    //     }
    //     $conn->close();
    }
?>



















<?
if(isset($_POST['update']) )
{
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $name = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['fullemail']);
   

    $query = "UPDATE tbl_admin SET full_name ='$full_name',username ='$username', WHERE id=$id";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: manage-admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: manage-admin.php");
        exit(0);
    }

}
?>