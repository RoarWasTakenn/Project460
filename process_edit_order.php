<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $orderID = filter_input(INPUT_POST, 'orderID', FILTER_SANITIZE_NUMBER_INT);
    $Name = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_STRING);
    $phoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);

    // Add your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "racetracks";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE orders SET Name=?, phoneNumber=? WHERE orderID=?");
    $stmt->bind_param("ssi", $Name, $phoneNumber, $orderID);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Order updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Form not submitted";
}
?>
