<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>

<body>
    <h2>Home</h2>
    <?php
    // Your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "racetracks";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize user input
        $searchForm = filter_input(INPUT_POST, 'searchForm', FILTER_SANITIZE_STRING);
        $addOrderForm = filter_input(INPUT_POST, 'addOrderForm', FILTER_SANITIZE_STRING);
        $deleteOrderForm = filter_input(INPUT_POST, 'deleteOrderForm', FILTER_SANITIZE_STRING);
        $editOrderForm = filter_input(INPUT_POST, 'editOrderForm', FILTER_SANITIZE_STRING);
        $insertCustomerForm = filter_input(INPUT_POST, 'insertCustomerForm', FILTER_SANITIZE_STRING);
        $editCustomerForm = filter_input(INPUT_POST, 'editCustomerForm', FILTER_SANITIZE_STRING);
        $deleteCustomerForm = filter_input(INPUT_POST, 'deleteCustomerForm', FILTER_SANITIZE_STRING);

        // Determine which form was submitted and redirect accordingly
        if ($searchForm !== null) {
            // Redirect to the search page
            header("Location: search.php");
            exit();
        } elseif ($addOrderForm !== null) {
            // Redirect to the add order page
            header("Location: add_order.php");
            exit();
        } elseif ($deleteOrderForm !== null) {
            // Redirect to the delete order page
            header("Location: delete_order.php");
            exit();
        } elseif ($editOrderForm !== null) {
            // Redirect to the edit order page
            header("Location: edit_order.php");
            exit();
        } elseif ($insertCustomerForm !== null) {
            // Redirect to the insert customer page
            header("Location: insertCustomer.php");
            exit();
        } elseif ($editCustomerForm !== null) {
            // Redirect to the edit customer page
            header("Location: edit_customer.php");
            exit();
        }
        
    }