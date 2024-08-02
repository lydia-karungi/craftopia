<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload dependencies using Composer
require 'vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env file to manage environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database connection settings from .env file
$servername = $_ENV['DB_SERVERNAME'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'fetch' parameter is set to 'reviews'
if (isset($_GET['fetch']) && $_GET['fetch'] === 'reviews') {
    // Fetch reviews from the database
    // Update the column names to match your database schema
    $stmt = $conn->prepare("SELECT reviewer_name, rating, review_text FROM reviews ORDER BY id DESC");
    $stmt->execute();
    $result = $stmt->get_result();

    // Store fetched reviews in an array
    $reviews = [];
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Set the response content type to JSON and output the reviews
    header('Content-Type: application/json');
    echo json_encode($reviews);
    exit;
}

// Close the database connection if the 'fetch' parameter is not 'reviews'
$conn->close();
?>
