<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $orderID = filter_input(INPUT_POST, 'orderIDtb', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'Nametb', FILTER_SANITIZE_STRING);
    $phoneNumber = filter_input(INPUT_POST, 'Phonetb', FILTER_SANITIZE_STRING);
    $license = filter_input(INPUT_POST, 'licensetb', FILTER_SANITIZE_STRING);
    $vehBrand = filter_input(INPUT_POST, 'vehBrandtb', FILTER_SANITIZE_STRING);
    $vehYear = filter_input(INPUT_POST, 'vehYeartb', FILTER_SANITIZE_STRING);
    $vehType = filter_input(INPUT_POST, 'vehTypetb', FILTER_SANITIZE_STRING);
    $repairType = filter_input(INPUT_POST, 'repairTypetb', FILTER_SANITIZE_STRING);
    $specificType = filter_input(INPUT_POST, 'specificTypetb', FILTER_SANITIZE_STRING);
    $duration = filter_input(INPUT_POST, 'durationtb', FILTER_SANITIZE_STRING);
    $cost = filter_input(INPUT_POST, 'costtb', FILTER_SANITIZE_STRING);

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
    $update_order_query = "UPDATE orders SET Name=?, phoneNumber=?, License=?, vehBrand=?, vehYear=?, vehType=?, repairType=?, specificType=?, duration=?, cost=? WHERE orderID=?";
    $stmt = $conn->prepare($update_order_query);
    $stmt->bind_param("sssssssssssi", $name, $phoneNumber, $license, $vehBrand, $vehYear, $vehType, $repairType, $specificType, $duration, $cost, $orderID);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Order updated successfully";
    } else {
        echo "Error updating order: " . $conn->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Form not submitted";
}
?>
