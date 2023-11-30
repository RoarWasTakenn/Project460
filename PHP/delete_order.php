<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Order</title>
</head>

<body>
    <h2>Delete Order</h2>
    <form action="process_delete_order.php" method="post">
        <label for="orderID">Enter Order ID to Delete:</label>
        <input type="text" name="orderID" required>

        <input type="submit" value="Delete Order">
    </form>
</body>

</html>
