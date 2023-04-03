<?php include('partials/menu.php') ?>
    <!--Main content section starts-->
    <div class = "main-content">
        <div class = "wrapper">
            <h1>Order</h1>
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
            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $_POST['total'];
            $order_date = $_POST['order_date'];
            $status = $_POST['status'];
            $customer_contact = $_POST['customer_contact'];
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];
            
        
            $sql = "INSERT INTO tbl_food (food, price, qty, total, order_date, status,customer_contact,customer_name, customer_email, customer_address) VALUES
             ($food, $price, $qty, $total, $order_date, $status, $customer_contact, $customer_name, $customer_email, $customer_address)";
        
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

            <br><br>
            <table class ="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Food Requested</th>
                    <th>Price</th>
                    <th>quantity</th>
                    <th>total</th>
                    <th>order_date</th>
                    <th>Status</th>
                    <th>Contact</th>
                    <th>Customer</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Address</th>

                </tr>

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
$sql = "SELECT * FROM tbl_food";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Display data in a table format
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["food"] . "</td>
        <td>". $row["price"]. "</td
        <td>". $row["qty"]. "</td>
        <td>".$row["total"]."</td>
        <td>" . $row["order_date"] . "</td>
        <td>" . $row["status"] . "</td>
        <td>". $row["customer_contact"]. "</td
        <td>". $row["customer_name"]. "</td>
        <td>". $row["customer_email"]. "</td>
        <td>". $row["customer_address"]. "</td>
        <td>";
     ?>
                  <?php 
                //   deleting row from the database
                  ?>
                    <a href="#" class = "btn-secondary">update Food</a>
                    <a href="#" class = "btn-secondary">Delete Food</a>
        <?php
     echo "</td></tr>";
     
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
</div>
   <?php include('partials/footer.php') ?>