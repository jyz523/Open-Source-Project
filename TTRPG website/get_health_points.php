<?php
$servername = "<input your own>";
$username = "<input your own>";
$password = "<input your own>";
$dbname = "character_type"; // Replace with your actual database name

// Get the character ID from the request
$typeID = $_GET["type_id"];

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch the health_points from the character_type table
$sql = "SELECT health_points FROM character_type WHERE type_id = $typeID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $healthPoints = $row["health_points"];
  echo $healthPoints;
} else {
  echo "0"; // Default value if no health_points found
}

// Close the database connection
$conn->close();
?>
