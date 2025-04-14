<?php
// Disable error output to avoid unwanted characters in the JSON response
ini_set('display_errors', 0);
error_reporting(0);

ob_start();  // Start output buffering

include "config.php";
include "database.inc.php";

// Set header to JSON
header('Content-Type: application/json');

$category = $_GET['category'] ?? '';
if (empty($category)) {
    error_log("Category is required");
    echo json_encode(['error' => 'Category is required']);
    exit;
}

$sql = "SELECT * FROM items WHERE category = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    error_log("Failed to prepare statement: " . $conn->error);
    echo json_encode(['error' => 'Failed to prepare statement']);
    exit;
}

$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

$items = [];
while ($row = $result->fetch_assoc()) {
    $items[] = [
        'title' => $row['title'],
        'imageSrc' => $row['imageSrc'],
        'price' => (float)$row['price'], // Ensure price is a number
        'description' => $row['description'] // Include description
    ];
}

if (empty($items)) {
    error_log("No items found for category: " . $category);
}

// Clean any buffered output (whitespace, etc.)
ob_clean();
echo json_encode($items);

$stmt->close();
$conn->close();
ob_end_flush();
?>
