<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
</head>

<body>
    <h2>Edit Order</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $orderID = $_POST['orderIDtb'];
        $name = $_POST['Nametb'];
        $phoneNumber = $_POST['Phonetb'];

        // Your database connection code here
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "racetracks";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update data in the orders table
        $update_order_query = "UPDATE orders SET Name=?, phoneNumber=? WHERE orderID=?";
        $stmt_order = $conn->prepare($update_order_query);
        $stmt_order->bind_param("ssi", $name, $phoneNumber, $orderID);
        $result_order = $stmt_order->execute();

        if ($result_order) {
            echo "Order updated successfully";

            // Fetch updated order information
            $select_order_query = "SELECT * FROM orders WHERE orderID=?";
            $stmt_select_order = $conn->prepare($select_order_query);
            $stmt_select_order->bind_param("i", $orderID);
            $stmt_select_order->execute();
            $result_select_order = $stmt_select_order->get_result();
            $row = $result_select_order->fetch_assoc();

            // Display updated order information
            echo "<br>Order ID: " . $row['orderID'];
            echo "<br>Name: " . $row['Name'];
            echo "<br>Phone Number: " . $row['phoneNumber'];
            // Add more fields as needed
        } else {
            echo "Error updating order: " . $conn->error;
        }

        $stmt_order->close();
        $stmt_select_order->close();
        $conn->close();
    }
    ?>

    <form action="edit_order_test.php" method="post">
        <label for="orderIDtb">Order ID:</label>
        <input type="text" name="orderIDtb" readonly>

        <label for="Nametb">Name:</label>
        <input type="text" name="Nametb">

        <label for="Phonetb">Phone Number:</label>
        <input type="text" name="Phonetb">


        <input type="submit" value="Update" name="updatebtn">
    </form>

</body>

</html>
