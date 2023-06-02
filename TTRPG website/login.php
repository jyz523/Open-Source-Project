<?php
    // Database connection parameters
    $host = "IP address or localhost";
    $username = "<mysql username>";
    $password = "<mysql password>";
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

        $sql = "SELECT * FROM users WHERE (username = '$loginUsername' OR email = '$loginUsername')";
        $result = mysqli_query($conn, $sql);

        // Check if the user exists
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $correctUsername = $row["username"];
            $correctPassword = $row["password"];

            // Check if the username and password are correct
            if ($loginUsername === $correctUsername && $loginPassword === $correctPassword) {
                // Proceed with login
                echo "<script>alert('Login successful!'); window.location.href = 'http://IP address or localhost/main.php';</script>";
                exit(); // Stop further execution
            } else {
                // Incorrect password
                echo "<script>alert('Invalid username or password.'); window.location.href = 'http://IP address or localhost/';</script>";
                exit(); // Stop further execution
            }
        } else {
            // User does not exist
            echo "<script>alert('Invalid username or password.'); window.location.href = 'http://IP address or localhost/';</script>";
            exit(); // Stop further execution
        }
    }
?>
