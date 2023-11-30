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

        // Use prepared statements to prevent SQL injection
        $insert_customer_query = $conn->prepare("INSERT INTO customer (Name, phoneNumber) VALUES (?, ?)");
        $insert_customer_query->bind_param("ss", $name, $phoneNumber);

        if ($insert_customer_query->execute()) {
            // Get the orderID of the newly inserted customer
            $orderID = $conn->insert_id;

            // Insert data into the orders table
            $insert_order_query = $conn->prepare("INSERT INTO orders (orderID, Name, phoneNumber) VALUES (?, ?, ?)");
            $insert_order_query->bind_param("iss", $orderID, $name, $phoneNumber);

            if ($insert_order_query->execute()) {
                echo "Customer and order added successfully";
            } else {
                echo "Error inserting order: " . $conn->error;
            }

            $insert_order_query->close();
        } else {
            echo "Error inserting customer: " . $conn->error;
        }

        $insert_customer_query->close();
    } elseif (isset($_POST["editCustomerForm"])) {
        // Process edit customer form
        // Add your edit customer logic here

    } elseif (isset($_POST["deleteCustomerForm"])) {
        // Process delete customer form
        // Add your delete customer logic here

    } elseif (isset($_POST["editOrderForm"])) {
        // Process edit order form


    } elseif (isset($_POST["deleteOrderForm"])) {
        // Process delete order form
   

    } elseif (isset($_POST["addOrderForm"])) {
        // Process add order form
        

    }

    // Close the database connection
    $conn->close();
}
?>
