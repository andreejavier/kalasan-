<?php
// get_plant_data.php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root"; // Update with your username
$password = ""; // Update with your password
$dbname = "dev_kalasan_db"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch plant data
$sql = "SELECT * FROM `tree_planted`"; 
$result = $conn->query($sql);

$plants = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $plants[] = $row; // Append each row to the plants array
    }
}

$conn->close();

// Output JSON data
echo json_encode($plants);
?>
