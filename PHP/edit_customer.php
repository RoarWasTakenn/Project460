<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
</head>

<body>
    <h2>Edit Customer</h2>

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

        // Update data in the customer table
        $update_customer_query = "UPDATE customer SET Name=?, phoneNumber=? WHERE orderID=?";
        $stmt_customer = $conn->prepare($update_customer_query);
        $stmt_customer->bind_param("ssi", $name, $phoneNumber, $orderID);
        $result_customer = $stmt_customer->execute();

        if ($result_customer) {
            echo "Customer updated successfully";

            // Fetch updated customer information
            $select_customer_query = "SELECT * FROM customer WHERE orderID=?";
            $stmt_select_customer = $conn->prepare($select_customer_query);
            $stmt_select_customer->bind_param("i", $orderID);
            $stmt_select_customer->execute();
            $result_select_customer = $stmt_select_customer->get_result();
            $row = $result_select_customer->fetch_assoc();

            // Display updated customer information
            echo "<br>Order ID: " . $row['orderID'];
            echo "<br>Name: " . $row['Name'];
            echo "<br>Phone Number: " . $row['phoneNumber'];
        } else {
            echo "Error updating customer: " . $conn->error;
        }

        $stmt_customer->close();
        $stmt_select_customer->close();
        $conn->close();
    }
    ?>

    <form action="edit_customer.php" method="post">
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
