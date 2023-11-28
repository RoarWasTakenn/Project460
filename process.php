<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "racetracks";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["addCustomerForm"])) {
        // Process add customer form
        $name = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_STRING);
        $phoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);

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
    } elseif (isset($_POST["editCustomerForm"])) {
        // Process edit customer form
        // Add your edit customer logic here
    } elseif (isset($_POST["deleteCustomerForm"])) {
        // Process delete customer form
        // Add your delete customer logic here
    } elseif (isset($_POST["editOrderForm"])) {
        // Process edit order form
        // Add your edit order logic here
    } elseif (isset($_POST["deleteOrderForm"])) {
        // Process delete order form
        // Add your delete order logic here
    } elseif (isset($_POST["addOrderForm"])) {
        // Process add order form
        // Add your add order logic here
    }

    // Close the database connection
    $conn->close();
}
?>
