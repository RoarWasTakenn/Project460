<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
</head>

<body>
    <h2>Edit Order</h2>

    <?php
    
    $orderID = $name = $phoneNumber = $license = $vehBrand = $vehYear = $vehType = $repairType = $specificType = $duration = $cost = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $orderID = $_POST['orderIDtb'];
        $name = $_POST['Nametb'];
        $phoneNumber = $_POST['Phonetb'];
        $license = $_POST['licensetb'];
        $vehBrand = $_POST['vehBrandtb'];
        $vehYear = $_POST['vehYeartb'];
        $vehType = $_POST['vehTypetb'];
        $repairType = $_POST['repairTypetb'];
        $specificType = $_POST['specificTypetb'];
        $duration = $_POST['durationtb'];
        $cost = $_POST['costtb'];
       
    ;
        $cost = $_POST['costtb'];

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
        $update_order_query = "UPDATE orders SET Name=?, phoneNumber=?, License=?, vehBrand=?, vehYear=?, vehType=?, repairType=?, specificType=?, duration=?, cost=? WHERE orderID=?";
        $stmt_order = $conn->prepare($update_order_query);
        $stmt_order->bind_param("ssssssssssi", $name, $phoneNumber, $license, $vehBrand, $vehYear, $vehType, $repairType, $specificType, $duration, $cost, $orderID);
        $result_order = $stmt_order->execute();

        if ($result_order) {
            echo "Order updated successfully";
        } else {
            echo "Error updating order: " . $conn->error;
        }

        $stmt_order->close();
        $conn->close();
    }
    ?>

<form action="process_edit_order.php" method="post">
    <label for="orderIDtb">Order ID:</label>
    <input type="hidden" name="orderIDtb" value="<?php echo $orderID; ?>"><br>

    <label for="Nametb">Name:</label>
    <input type="text" name="Nametb" value="<?php echo $name; ?>"><br>

    <label for="Phonetb">Phone Number:</label>
    <input type="text" name="Phonetb" value="<?php echo $phoneNumber; ?>"><br>

    <label for="licensetb">License:</label>
    <input type="text" name="licensetb" value="<?php echo $license; ?>"><br>

    <label for="vehBrandtb">Vehicle Brand:</label>
    <input type="text" name="vehBrandtb" value="<?php echo $vehBrand; ?>"><br>

    <label for="vehYeartb">Vehicle Year:</label>
    <input type="text" name="vehYeartb" value="<?php echo $vehYear; ?>"><br>

    <label for="vehTypetb">Vehicle Type:</label>
    <input type="text" name="vehTypetb" value="<?php echo $vehType; ?>"><br>

    <label for="repairTypetb">Repair Type:</label>
    <input type="text" name="repairTypetb" value="<?php echo $repairType; ?>"><br>

    <label for="specificTypetb">Specific Type:</label>
    <input type="text" name="specificTypetb" value="<?php echo $specificType; ?>"><br>

    <label for="durationtb">Duration:</label>
    <input type="text" name="durationtb" value="<?php echo $duration; ?>"><br>

    <label for="costtb">Cost:</label>
    <input type="text" name="costtb" value="<?php echo $cost; ?>"><br>

    <input type="submit" value="Update" name="updatebtn">
</form>


</body>

</html>
