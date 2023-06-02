<?php
session_start(); // Add session_start() to initialize sessions

$host = "IP address or localhost";
$username = "<mysql username>";
$password = "<mysql password>";
$database = "signup";

// Establish database connection
$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Failed to connect: " . mysqli_connect_error());
}

function check_login($con)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // Redirect to login
    header("Location: login.php");
    exit; // Use exit instead of die
}

function random_num($length)
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }

    return $text;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        // Read from the database
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    exit; // Use exit instead of die
                }
            }
        }

    }
}
?>
