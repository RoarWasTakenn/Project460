<!-- edit_order_form.php -->
<form action="process_edit_order.php" method="post">
    <label for="orderID">Order ID:</label>
    <input type="text" name="orderID" value="<?php echo $row['orderID']; ?>" readonly>

    <label for="Name">Name:</label>
    <input type="text" name="Name" value="<?php echo $row['Name']; ?>" required>

    <label for="phoneNumber">Phone Number:</label>
    <input type="text" name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>" required>

    <label for="license">License:</label>
    <input type="text" name="license" value="<?php echo $row['License']; ?>">

    <label for="vehBrand">Vehicle Brand:</label>
    <input type="text" name="vehBrand" value="<?php echo $row['vehBrand']; ?>">

    <label for="vehYear">Vehicle Year:</label>
    <input type="text" name="vehYear" value="<?php echo $row['vehYear']; ?>">

    <label for="vehType">Vehicle Type:</label>
    <input type="text" name="vehType" value="<?php echo $row['vehType']; ?>">

    <label for="repairType">Repair Type:</label>
    <input type="text" name="repairType" value="<?php echo $row['repairType']; ?>">

    <label for="specificType">Specific Type:</label>
    <input type="text" name="specificType" value="<?php echo $row['specificType']; ?>">

    <label for="duration">Duration:</label>
    <input type="text" name="duration" value="<?php echo $row['duration']; ?>">

    <label for="cost">Cost:</label>
    <input type="text" name="cost" value="<?php echo $row['cost']; ?>">

    <input type="submit" value="Update" name="editOrderForm">
</form>
