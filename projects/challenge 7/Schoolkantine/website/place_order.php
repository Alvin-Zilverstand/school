<?php
include 'config.php';

// Set header to JSON
header('Content-Type: application/json');

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);

$items = json_encode($data['items'] ?? []);
$total_price = $data['total_price'] ?? 0;

if (empty($items) || empty($total_price)) {
    echo json_encode(['success' => false, 'message' => 'Invalid order data']);
    exit;
}

// Fetch the last order number
$sql = "SELECT order_number FROM orders ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result === false) {
    error_log("Failed to fetch last order number: " . $conn->error);
    echo json_encode(['success' => false, 'message' => 'Failed to fetch last order number']);
    exit;
}

$last_order_number = $result->fetch_assoc()['order_number'] ?? '#000';
$new_order_number = '#' . str_pad((int)substr($last_order_number, 1) + 1, 3, '0', STR_PAD_LEFT);

$sql = "INSERT INTO orders (order_number, items, total_price) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    error_log("Failed to prepare statement: " . $conn->error);
    echo json_encode(['success' => false, 'message' => 'Failed to prepare statement']);
    exit;
}

$stmt->bind_param("ssd", $new_order_number, $items, $total_price);
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'order_number' => $new_order_number]);
} else {
    error_log("Failed to execute statement: " . $stmt->error);
    echo json_encode(['success' => false, 'message' => 'Failed to execute statement']);
}

$stmt->close();
$conn->close();
?>
