<?php
    // Database connection parameters
    $host = "192.168.64.3";
    $username = "test";
    $password = "test12345";
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
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            // User exists, perform further checks on the password, if necessary
            // TODO: Add password validation logic here, e.g., comparing hashed passwords
            
            // Proceed with login
            echo "<script>alert('Login successful!'); window.location.href = 'http://192.168.64.3/final_project/TTRPG%20website/main.php';</script>";
        } else {
            // User does not exist or credentials are incorrect
            echo "<script>alert('Invalid username or password.'); window.location.href = 'http://192.168.64.3/final_project/signup&login/';</script>";
        }
    }
?>
