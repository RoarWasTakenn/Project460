<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $orderID = filter_input(INPUT_POST, 'orderID', FILTER_SANITIZE_STRING);
    $Name = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_STRING);
    $phoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);
    // Add more fields as needed

    // Your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "racetracks";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO orders (orderID, Name, phoneNumber) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $orderID, $Name, $phoneNumber);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Order added successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
