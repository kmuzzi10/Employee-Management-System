<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if data is received from the AJAX request
if (isset($_POST['name']) && isset($_POST['position']) && isset($_POST['salary'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    // Insert the employee into the database
    $sql = "INSERT INTO employees (name, position, salary) VALUES ('$name', '$position', '$salary')";
    if ($conn->query($sql) === TRUE) {
        echo "Employee added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Invalid data received.";
}

$conn->close();
?>
