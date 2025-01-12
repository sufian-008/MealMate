<?php
session_start();

// Database configuration
$host = 'localhost';
$dbname = 'mealmate';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check user credentials
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password); // Plain text password matching
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Set session variables
        $_SESSION['userRole'] = $user['role'];

        // Redirect based on role
        if ($user['role'] === 'buyer') {
            header('Location: BuyerDashboard.html');
        } elseif ($user['role'] === 'seller') {
            header('Location: SellerDashboard.html');
        }
        exit;
    } else {
        // If credentials are invalid, show an alert and redirect back to login
        echo '<script>alert("Invalid credentials. Please try again."); window.location.href = "Login.html";</script>';
    }
}
?>
