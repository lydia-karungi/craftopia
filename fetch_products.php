<?php
$servername = "127.0.0.1";
$username = "root";
$password = "simple@123"; // your database password
$dbname = "craftopia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : 0;
$maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : 999999;
$category = isset($_GET['category']) ? $_GET['category'] : '';
$availability = isset($_GET['availability']) ? $_GET['availability'] : '';

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
