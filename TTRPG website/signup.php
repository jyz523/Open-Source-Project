<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

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
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            // Display pop-up message
            echo '<script>alert("Account created successfully!");</script>';
            
            // Redirect back to the specified URL
            echo '<script>window.location.href = "http://192.168.64.3";</script>';
            
            exit(); // Stop executing the rest of the PHP code
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>
