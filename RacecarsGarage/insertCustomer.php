<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Racecar Garage</title>
</head>

<body>
    <h2>Insert Customer</h2>

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

        // Insert data into the customer table
        $insert_customer_query = "INSERT INTO customer (Name, phoneNumber) VALUES ('$name', '$phoneNumber')";
        $result_customer = $conn->query($insert_customer_query);

        if ($result_customer) {
            // Get the orderID of the newly inserted customer
            $orderID = $conn->insert_id;

            // Insert data into the orders table
            $insert_order_query = "INSERT INTO orders (orderID, Name, phoneNumber) VALUES ('$orderID', '$name', '$phoneNumber')";
            $result_order = $conn->query($insert_order_query);

            if ($result_order) {
                echo "Customer and order added successfully";
            } else {
                echo "Error inserting order: " . $conn->error;
            }
        } else {
            echo "Error inserting customer: " . $conn->error;
        }

        $conn->close();
    }
    ?>

    <form action="" method="post">
        <label for="Name">Name:</label>
        <input type="text" name="Name" required>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" name="phoneNumber" required>

        <input type="submit" value="Insert">
    </form>
</body>

</html>
