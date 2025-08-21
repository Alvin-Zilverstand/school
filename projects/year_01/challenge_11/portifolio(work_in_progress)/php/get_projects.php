<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Add CORS headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Content-Type: application/json');

require_once 'config.php';

try {
    $pdo = get_pdo();
    $stmt = $pdo->query('SELECT id, title, description, long_description, image_url, project_url, tags, created_at FROM projects ORDER BY created_at DESC');
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($projects);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
} 