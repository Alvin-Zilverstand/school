<?php
// =======================
// Database configuratie
// =======================
$host = "localhost";
$username = "root";
$password = ""; // XAMPP default on Windows is empty password
$database = "db_awfulportfolio"; // Use the database name, not the .sql file name

// Maak verbinding
$conn = new mysqli($host, $username, $password, $database);

// Check verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Zorg voor juiste charset
$conn->set_charset("utf8mb4");
