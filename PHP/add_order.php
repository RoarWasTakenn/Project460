<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Order</title>
</head>

<body>
    <h2>Add New Order</h2>

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
        $name = filter_input(INPUT_POST, 'Nametb', FILTER_SANITIZE_STRING);
        $phoneNumber = filter_input(INPUT_POST, 'Phonetb', FILTER_SANITIZE_STRING);
        $license = filter_input(INPUT_POST, 'licensetb', FILTER_SANITIZE_STRING);
        $vehBrand = filter_input(INPUT_POST, 'vehBrandtb', FILTER_SANITIZE_STRING);
        $vehYear = filter_input(INPUT_POST, 'vehYeartb', FILTER_SANITIZE_STRING);
        $vehType = filter_input(INPUT_POST, 'vehTypetb', FILTER_SANITIZE_STRING);
        $repairType = filter_input(INPUT_POST, 'repairTypetb', FILTER_SANITIZE_STRING);
        $specificType = filter_input(INPUT_POST, 'specificTypetb', FILTER_SANITIZE_STRING);
        $duration = filter_input(INPUT_POST, 'durationtb', FILTER_SANITIZE_STRING);
        $cost = filter_input(INPUT_POST, 'costtb', FILTER_SANITIZE_STRING);

        // Insert data into the orders table
        $insert_order_query = "INSERT INTO orders (Name, phoneNumber, License, vehBrand, vehYear, vehType, repairType, specificType, duration, cost) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_order = $conn->prepare($insert_order_query);
        $stmt_order->bind_param("ssssssssss", $name, $phoneNumber, $license, $vehBrand, $vehYear, $vehType, $repairType, $specificType, $duration, $cost);
        $result_order = $stmt_order->execute();

        if ($result_order) {
            echo "Order added successfully";
            
        } else {
            echo "Error adding order: " . $conn->error;
        }

        $stmt_order->close();
    }
    ?>

    <form action="" method="post">
        <label for="Nametb">Name:</label>
        <input type="text" name="Nametb" required><br>

        <label for="Phonetb">Phone Number:</label>
        <input type="text" name="Phonetb" required><br>

        <label for="licensetb">License:</label>
        <input type="text" name="licensetb" required><br>

        <label for="vehBrandtb">Vehicle Brand:</label>
        <input type="text" name="vehBrandtb" required><br>

        <label for="vehYeartb">Vehicle Year:</label>
        <input type="text" name="vehYeartb" required><br>

        <label for="vehTypetb">Vehicle Type:</label>
        <input type="text" name="vehTypetb" required><br>

        <label for="repairTypetb">Repair Type:</label>
        <input type="text" name="repairTypetb" required><br>

        <label for="specificTypetb">Specific Type:</label>
        <input type="text" name="specificTypetb" required><br>

        <label for="durationtb">Duration:</label>
        <input type="text" name="durationtb" required><br>

        <label for="costtb">Cost:</label>
        <input type="text" name="costtb" required><br>

        <input type="submit" value="Add Order">
    </form>

</body>

</html>
