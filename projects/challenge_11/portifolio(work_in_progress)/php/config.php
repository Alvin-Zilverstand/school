<?php
// config.php
$host = '100.125.62.25'; // Change if your MySQL server is elsewhere
$db   = 'portfolio'; // Change to your database name
$user = 'portifolio'; // Change to your MySQL username
$pass = 'S](L8WpeW_(EGyBP'; // Change to your MySQL password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
function get_pdo() {
    global $dsn, $user, $pass, $options;
    return new PDO($dsn, $user, $pass, $options);
} 