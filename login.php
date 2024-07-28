<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database connection settings
$servername = $_ENV['DB_SERVERNAME'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the email and password from POST
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User exists, login successful
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['user_id'] = $row['id'];
    echo "Login successful! Redirecting...";
} else {
    // User does not exist, login failed
    echo "Invalid email or password!";
}

// Close connection
$stmt->close();
$conn->close();
?>
