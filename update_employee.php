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
// Get employee details from POST request
$empId = $_POST["empId"];
$newName = $_POST["newName"];
$newPosition = $_POST["newPosition"];
$newSalary = $_POST["newSalary"];

// Update employee in the database
$sql = "UPDATE employees SET name='$newName', position='$newPosition', salary='$newSalary' WHERE id='$empId'";

if ($conn->query($sql) === TRUE) {
    echo "Employee updated successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
