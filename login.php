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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email and password from POST
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($email && $password) {
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
            // Output JSON response
            echo json_encode(["success" => true, "message" => "Login successful!"]);
        } else {
            // User does not exist, login failed
            echo json_encode(["success" => false, "message" => "Invalid email or password!"]);
        }

        // Close statement
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Please enter both email and password."]);
    }
}

// Close connection
$conn->close();
?>
