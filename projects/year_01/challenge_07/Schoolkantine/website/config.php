<?php
$servername = "localhost:3306";
$username = "database";
$password = "13cAv?i52";
$dbname = "schoolkantine";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
