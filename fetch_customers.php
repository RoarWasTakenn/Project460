<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch customer data
$sql = "SELECT * FROM Customer";
$result = $conn->query($sql);

$customers = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }
}

// Close connection
$conn->close();

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($customers);
?>
