<?php
    // Database connection parameters
    $host = "IP Address or localhost";
    $username = "<input>";
    $password = "<input>";
    $database = "signup";

    // Create a database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $loginUsername = $_POST["loginUsername"];
        $loginPassword = $_POST["loginPassword"];

        // TODO: Perform validation on the form data
        // You can check if the fields are empty, etc.

        // Query the database to check if the user exists
        $sql = "SELECT * FROM users WHERE (username = '$loginUsername' OR email = '$loginUsername')";

        // Redirect to another website
        header("Location:<html of the actual TTRPG website>");
        exit; // Ensure that the script stops executing after the redirect
    }
?>
