<form action="process_edit_order.php" method="post">
    <!-- Include the necessary input fields for editing (orderID, Name, phoneNumber, and others) here -->
    <label for="orderID">Order ID:</label>
    <input type="text" name="orderID" value="<?php echo $row['orderID']; ?>" readonly>

    <label for="Name">Name:</label>
    <input type="text" name="Name" value="<?php echo $row['Name']; ?>" required>

    <label for="phoneNumber">Phone Number:</label>
    <input type="text" name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>" required>


    <input type="submit" value="Update" name="editOrderForm">
</form>
