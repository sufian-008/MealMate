<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "mealmate"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role']; // Determine if the user is a buyer or seller

    $fullName = $conn->real_escape_string($_POST['fullName']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']); // Store the plain text password
    $phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
    
    if ($role === 'buyer') {
        $address = $conn->real_escape_string($_POST['address']);

        // Insert into users table for buyers
        $sql = "INSERT INTO users (full_name, email, password, phone_number, address, role) 
                VALUES ('$fullName', '$email', '$password', '$phoneNumber', '$address', 'buyer')";
    } elseif ($role === 'seller') {
        $foodCategory = $conn->real_escape_string($_POST['foodCategory']);
        $paymentDetails = $conn->real_escape_string($_POST['paymentDetails']);

        // Insert into users table for sellers
        $sql = "INSERT INTO users (full_name, email, password, phone_number, food_category, payment_details, role) 
                VALUES ('$fullName', '$email', '$password', '$phoneNumber', '$foodCategory', '$paymentDetails', 'seller')";
    } else {
        echo "Invalid role!";
        exit();
    }

    if ($conn->query($sql) === TRUE) {
        echo "New $role account created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
