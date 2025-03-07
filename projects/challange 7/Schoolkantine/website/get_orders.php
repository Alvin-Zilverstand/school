<?php
include 'config.php';

// Set header to JSON
header('Content-Type: application/json');

// Fetch orders from the database
$sql = "SELECT order_number, items, total_price, order_time FROM orders ORDER BY order_time DESC";
$result = $conn->query($sql);

if ($result === false) {
    error_log("Failed to fetch orders: " . $conn->error);
    echo json_encode(['error' => 'Failed to fetch orders']);
    exit;
}

$orders = [];
while ($row = $result->fetch_assoc()) {
    $row['items'] = json_decode($row['items'], true); // Decode the JSON items
    $row['total_price'] = (float)$row['total_price']; // Ensure total_price is a number
    $orders[] = $row;
}

echo json_encode($orders);

$conn->close();
?>
