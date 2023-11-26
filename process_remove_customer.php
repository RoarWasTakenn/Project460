<?php
// Connect to your MySQL database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "racetracks";

$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$customerName = $_POST['customerName'];
$phoneNumber = $_POST['phoneNumber'];

// Find the orderID based on customer information
$sql = "SELECT orderID FROM Customer WHERE Name = '$customerName' AND phoneNumber = '$phoneNumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Customer found, remove related records from all tables
    $row = $result->fetch_assoc();
    $orderID = $row['orderID'];

    // Remove from RepairType table
    $conn->query("DELETE FROM RepairType WHERE orderID = '$orderID'");

    // Remove from Vehicle table
    $conn->query("DELETE FROM Vehicle WHERE orderID = '$orderID'");

    // Remove from Customer table
    $conn->query("DELETE FROM Customer WHERE orderID = '$orderID'");

    echo "Customer removed successfully.";
} else {
    echo "Customer not found.";
}

$conn->close();
?>
