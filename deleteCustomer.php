<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Customer</title>
</head>

<body>
    <h2>Delete Customer</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize user input
        $name = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_STRING);
        $phoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);

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
        $delete_customer_query = "DELETE FROM customer WHERE Name=? AND phoneNumber=?";
        $stmt = $conn->prepare($delete_customer_query);
        $stmt->bind_param("ss", $name, $phoneNumber);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Customer removed from the table";
        } else {
            echo "Error deleting customer: " . $conn->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>

    <form action="deleteCustomer.php" method="post">
        <label for="Name">Name:</label>
        <input type="text" name="Name" required>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" name="phoneNumber" required>

        <input type="submit" value="Delete" name="deleteCustomerForm">
    </form>

</body>

</html>
