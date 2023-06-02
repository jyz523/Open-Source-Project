<?php
$host = "IP address or localhost";
$username = "<mysql username>";
$password = "<mysql password>";
$dbname = "character_type"; // Replace with your actual database name

// Get the level parameter from the URL
$level = $_GET["level"];

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch the health_points for the selected level
$sql = "SELECT health_points FROM character_type WHERE type_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $level);
$stmt->execute();
$stmt->bind_result($healthPoints);
$stmt->fetch();
$stmt->close();

// Close the database connection
$conn->close();

// Return the health_points as the response
echo $healthPoints;
?>
