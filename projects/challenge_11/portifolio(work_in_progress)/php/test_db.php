<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

try {
    $pdo = get_pdo();
    echo "Database connection successful!<br>";
    
    // Test query
    $stmt = $pdo->query('SELECT COUNT(*) as count FROM projects');
    $result = $stmt->fetch();
    echo "Number of projects in database: " . $result['count'];
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} 