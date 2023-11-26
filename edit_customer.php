<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "Racetracks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize data from the form
$orderIDToEdit = intval($_POST['orderID']);

// Simple validation (add your specific validation rules)
if ($orderIDToEdit <= 0) {
    echo "Error: Invalid orderID.";
} else {
    // Retrieve customer data by orderID
    $sql = "SELECT * FROM Customer WHERE orderID = $orderIDToEdit";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the edit form with pre-filled data
        $row = $result->fetch_assoc();
        // Display the form with values populated for editing
    } else {
        echo "Customer not found";
    }

    // Process the form submission for editing
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize updated data
        $newName = mysqli_real_escape_string($conn, $_POST['newName']);
        // ... (retrieve other updated data)

        // Simple validation (add your specific validation rules)
        if (empty($newName)) {
            echo "Error: Invalid input.";
        } else {
            // Update customer data in the Customer table
            $updateSql = "UPDATE Customer SET Name = '$newName', phoneNumber = '$newPhoneNumber' WHERE orderID = $orderIDToEdit";

            if ($conn->query($updateSql) === TRUE) {
                echo "Customer updated successfully";
            } else {
                echo "Error: " . $updateSql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>
