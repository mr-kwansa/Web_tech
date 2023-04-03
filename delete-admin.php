<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the ID of the element to be deleted from the URL parameter
$id = $_GET['id'];

// Delete the element from the database
$sql = "DELETE FROM myTable WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Element deleted successfully";
} else {
    echo "Error deleting element: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
<!-- fgaehzgjhkdjl;' -->
<?php
// Connect to database
$db_host = 'localhost';
$db_user = 'username';
$db_pass = 'password';
$db_name = 'database_name';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Define function to delete element from database
function delete_element($id) {
    global $conn;
    $sql = "DELETE FROM elements WHERE id = $id";
    mysqli_query($conn, $sql);
}

// Check if delete button is clicked and call the function
if(isset($_POST['delete_btn'])) {
    $id_to_delete = $_POST['id'];
    delete_element($id_to_delete);
}
?>

<!-- HTML code for button and form -->
<form method="POST">
    <input type="hidden" name="id" value="1">
    <button type="submit" name="delete_btn">Delete Element</button>
</form>
