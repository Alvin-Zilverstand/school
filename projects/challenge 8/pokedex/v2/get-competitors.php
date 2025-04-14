<?php
$servername = "localhost:3306";
$username = "database1";
$password = "181t$1lJg";
$dbname = "pokedex1";

// Set the custom log file path
$logFile = __DIR__ . '/error_log.txt';

// Function to log messages
function logMessage($message) {
    global $logFile;
    error_log($message . "\n", 3, $logFile);
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    logMessage("Connection failed: " . $conn->connect_error);
    header("Content-Type: application/json");
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

header("Cache-Control: max-age=86400"); // Cache for 24 hours
header("Content-Type: application/json"); // Ensure JSON response

try {
    // Fetch competitors data with Pokémon details
    $sql = "SELECT u.user_id, COUNT(u.pokemon_id) AS pokemon_count, p.name, p.image_url
            FROM user_pokemon u
            JOIN pokemon p ON u.pokemon_id = p.id
            GROUP BY u.user_id, p.name, p.image_url
            ORDER BY pokemon_count DESC";
    logMessage("Executing query: $sql");
    $result = $conn->query($sql);

    if ($result === false) {
        throw new Exception("Query failed: " . $conn->error);
    }

    $competitors = [];
    while ($row = $result->fetch_assoc()) {
        $competitors[] = $row;
    }

    if (empty($competitors)) {
        logMessage("No competitors data found.");
        echo json_encode(["error" => "No competitors data found"]);
    } else {
        logMessage("Query result: " . json_encode($competitors));
        echo json_encode($competitors);
    }
} catch (Exception $e) {
    logMessage("Exception: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(["error" => "An error occurred while fetching competitors data"]);
}

$conn->close();
?>
