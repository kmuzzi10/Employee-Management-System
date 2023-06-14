<?php
// Connect to the database (same as get_employees.php)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get employee ID from POST request
$deleteId = $_POST["deleteId"];

// Delete employee from the database
$sql = "DELETE FROM employees WHERE id='$deleteId'";

if ($conn->query($sql) === TRUE) {
    echo "Employee deleted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
