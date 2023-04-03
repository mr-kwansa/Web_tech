<?php
// $Username = $_POST['username_log'];
// $UseREMAIL = $_POST['email_log'];
// $Userpassword = $_POST['pass_log'];

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "food_order";

// 			// Create connection
// 			$conn = mysqli_connect($servername, $username, $password, $dbname);

// 			// Check connection
// 			if (!$conn) {
// 				die("Connection failed: " . mysqli_connect_error());
// 			}
//             else{
//                 $stm =$conn->prepare("select * from users where email=?");
//                 $stm->bind_param("s",$UseREMAIL);
//                 $stm -> execute();
//                 $stm_result= $stm->get_result();
//                 if($stm_result->num_rows < 0){
//                     $data = $stm_result ->fetch_assoc();
//                     if($data['password']==
//                      $Userpassword){
//                         echo"login successful";
//                     }
//                     else{
//                         echo "Wrong password";                    }
//                 }else{
//                     echo"Invalid email";
//                 }
//             }
$Username = $_POST['username_log'];
$email = $_POST['email_log'];
$Userpassword = $_POST['pass_log'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_order";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $stm = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stm->bind_param("s", $email);
    $stm->execute();
    $stm_result = $stm->get_result();
    //validating the input from the form and the database to alow entery into the site 
    if ($stm_result->num_rows > 0) {
        $data = $stm_result->fetch_assoc();
        if ($data['password'] == $Userpassword) {
            echo "login successful";
            echo "<script>window.location.href='index.php';</script>";
            // header("location :index.php");
            // include('manage_admin.php');
            exit();
        } else {
            echo "Wrong password";
        }
    } else {
        echo "Invalid email";
    }
}

?> 