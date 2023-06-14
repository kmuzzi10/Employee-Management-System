<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the list of employees
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<center><tr><th>ID</th><th>Name</th><th>Position</th><th>Salary</th></tr></center>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["position"] . "</td>";
        echo "<td>" . $row["salary"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No employees found.";
}

$conn->close();

?>
