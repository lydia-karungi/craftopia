<?php
// Database connection settings
$servername = "127.0.0.1";
$username = "root"; // replace with your MySQL username
$password = "simple@123"; // replace with your MySQL password
$dbname = "craftopia";

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
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User exists, login successful
    echo "Login successful! Redirecting...";
} else {
    // User does not exist, login failed
    echo "Invalid email or password!";
}

// Close connection
$stmt->close();
$conn->close();
?>
