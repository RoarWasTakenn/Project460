<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $orderID = filter_input(INPUT_POST, 'orderID', FILTER_SANITIZE_NUMBER_INT);

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
    $deleteOrderQuery = "DELETE FROM orders WHERE orderID = ?";
    $stmt = $conn->prepare($deleteOrderQuery);
    $stmt->bind_param("i", $orderID);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Order deleted successfully";
    } else {
        echo "Error deleting order: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
