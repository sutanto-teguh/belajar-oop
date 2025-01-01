<?php
// Database connection
$host = "localhost";
$db_name = "maszeh";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Get the posted data
$data = json_decode(file_get_contents("php://input"));

// Insert data into userlogs table
$query = "INSERT INTO userlogs (latitude, longitude) VALUES (:latitude, :longitude)";
$stmt = $conn->prepare($query);
$stmt->bindParam(':latitude', $data->latitude);
$stmt->bindParam(':longitude', $data->longitude);

if($stmt->execute()) {
    echo "Location saved successfully.";
} else {
    echo "Failed to save location.";
}
?>