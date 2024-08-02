<?php
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

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for order
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];
    $paymentMethod = $_POST['paymentMethod'];
    $shippingAddress = $_POST['shippingAddress'];
    $billingAddress = $_POST['billingAddress'];
    $additionalNotes = $_POST['additionalNotes'];
    $totalAmount = $_POST['totalAmount'];

    // Example: Assuming a logged-in user session provides id
    // This should be replaced with the actual method of getting the user id
    $id = 1; // Dummy id, replace with actual user session id

    // Validate and sanitize input data
    // Example: $name = $conn->real_escape_string($name);

    // Insert order into database
    $stmt = $conn->prepare("INSERT INTO orders (id, order_date, total_amount, status, payment_method, shipping_address, billing_address, additional_notes) VALUES (?, NOW(), ?, 'pending', ?, ?, ?, ?)");
    $stmt->bind_param("idssss", $id, $totalAmount, $paymentMethod, $shippingAddress, $billingAddress, $additionalNotes);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Output success message and stop script execution
        echo "Order placed successfully!";
    } else {
        // Output error message and stop script execution
        echo "Error placing order: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Stop further execution to prevent mixed output
    exit;
}

// Existing code for fetching products
$product_id = isset($_GET['id']) ? $_GET['id'] : null;
$minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : 0;
$maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : 999999;
$category = isset($_GET['category']) ? $_GET['category'] : '';
$availability = isset($_GET['availability']) ? $_GET['availability'] : '';

if ($product_id) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();

    header('Content-Type: application/json');
    echo json_encode($product);
    exit;
}

$query = "SELECT p.* FROM products p WHERE p.price >= ? AND p.price <= ?";
$types = 'dd';
$params = [$minPrice, $maxPrice];

if ($category) {
    if ($category === 'collections') {
        $query = "SELECT p.* FROM products p
                  JOIN collection_products cp ON p.id = cp.product_id
                  JOIN collections c ON cp.collection_id = c.id
                  WHERE p.price >= ? AND p.price <= ?";
        if ($availability) {
            $query .= $availability === 'available' ? " AND p.stock > 0" : " AND p.stock = 0";
        }
    } else {
        $query .= " AND p.category_id = (SELECT id FROM categories WHERE name = ?)";
        $types .= 's';
        $params[] = $category;
        if ($availability) {
            $query .= $availability === 'available' ? " AND p.stock > 0" : " AND p.stock = 0";
        }
    }
} else {
    if ($availability) {
        $query .= $availability === 'available' ? " AND p.stock > 0" : " AND p.stock = 0";
    }
}

$stmt = $conn->prepare($query);

if ($category === 'collections') {
    $stmt->bind_param($types, $minPrice, $maxPrice);
} elseif ($category) {
    $stmt->bind_param($types, ...$params);
} else {
    $stmt->bind_param("dd", $minPrice, $maxPrice);
}

$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($products);
?>
