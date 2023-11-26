<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Racecars Garage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        #searchBox {
            margin-bottom: 10px;
        }

        #customerList {
            list-style-type: none;
            padding: 0;
        }

        .customerItem {
            border: 1px solid #ddd;
            margin-bottom: 8px;
            padding: 10px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Welcome to Racecars Garage</h1>

    <!-- Search Box -->
    <input type="text" id="searchBox" placeholder="Search for customers...">
    
    <!-- List of Customers -->
    <ul id="customerList">
        <!-- Customer items will be dynamically added here -->
    </ul>

    <ul>
        <li><a href="add_order.html">Add New Order</a></li>
        <li><a href="edit_customer.html">Edit Customer/Order</a></li>
        <li><a href="remove_customer.html">Remove Customer</a></li>
        <!-- Add links to other functionalities as needed -->
        <li><a href="another_functionality.html">Another Functionality</a></li>
    </ul>

    <!-- PHP script to fetch customer data -->
    <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "Racetracks";

        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM Customer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $customers = [];
            while ($row = $result->fetch_assoc()) {
                $customers[] = $row;
            }

            echo '<script>';
            echo 'const customers = ' . json_encode($customers) . ';';
            echo '</script>';
        }

        $conn->close();
    ?>

    <!-- JavaScript to handle search and render customers -->
    <script>
        function renderCustomerList(filteredCustomers) {
            const customerList = document.getElementById('customerList');
            customerList.innerHTML = '';

            filteredCustomers.forEach(customer => {
                const listItem = document.createElement('li');
                listItem.classList.add('customerItem');
                listItem.innerHTML = `
                    <strong>Customer ID:</strong> ${custo
