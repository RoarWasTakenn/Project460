<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "racetracks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $orderID = filter_input(INPUT_POST, 'orderID', FILTER_SANITIZE_STRING);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM orders WHERE orderID = ?");
    $stmt->bind_param("i", $orderID);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Order found, display the form for editing
        $row = $result->fetch_assoc();
        include 'edit_order_form.php'; // Include the form HTML
    } else {
        echo "Order not found";
    }

    $stmt->close();
    $conn->close();
}
?>
