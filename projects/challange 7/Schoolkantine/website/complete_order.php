<?php
include 'config.php';

// Set header to JSON
header('Content-Type: application/json');

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);
$order_number = $data['order_number'] ?? '';

if (empty($order_number)) {
    echo json_encode(['success' => false, 'message' => 'Order number is required']);
    exit;
}

// Delete the order from the database
$sql = "DELETE FROM orders WHERE order_number = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    error_log("Failed to prepare statement: " . $conn->error);
    echo json_encode(['success' => false, 'message' => 'Failed to prepare statement']);
    exit;
}

$stmt->bind_param("s", $order_number);
if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    error_log("Failed to execute statement: " . $stmt->error);
    echo json_encode(['success' => false, 'message' => 'Failed to execute statement']);
}

$stmt->close();
$conn->close();
?>
