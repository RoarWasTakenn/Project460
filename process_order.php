<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "Racetracks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize data from the form
$name = mysqli_real_escape_string($conn, $_POST['name']);
$phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
$license = mysqli_real_escape_string($conn, $_POST['license']);
$vehBrand = mysqli_real_escape_string($conn, $_POST['vehBrand']);
$vehYear = intval($_POST['vehYear']);
$vehType = mysqli_real_escape_string($conn, $_POST['vehType']);
$repairType = mysqli_real_escape_string($conn, $_POST['repairType']);
$specificType = mysqli_real_escape_string($conn, $_POST['specificType']);
$duration = intval($_POST['duration']);
$cost = floatval($_POST['cost']);

// Simple validation (add your specific validation rules)
if (empty($name) || empty($phoneNumber) || empty($license) || empty($vehBrand) || empty($vehType) || empty($repairType) || empty($specificType)) {
    echo "Error: All fields are required.";
} elseif ($vehYear <= 0 || $duration <= 0 || $cost <= 0) {
    echo "Error: Invalid input for numeric fields.";
} else {
    // Insert new order into the Orders table
    $sql = "INSERT INTO Orders (Name, phoneNumber, License, vehBrand, vehYear, vehType, repairType, specificType, duration, cost)
            VALUES ('$name', '$phoneNumber', '$license', '$vehBrand', $vehYear, '$vehType', '$repairType', '$specificType', $duration, $cost)";

    if ($conn->query($sql) === TRUE) {
        echo "New order added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
