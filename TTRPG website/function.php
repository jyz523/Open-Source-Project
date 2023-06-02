<?php
session_start(); // Start the session

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

$host = "IP address or localhost";
$username = "<mysql username>";
$password = "<mysql password>";
$database = "signup";

$con = mysqli_connect($host, $username, $password, $database); // Removed negation from the condition

if (!$con) {
    die("Failed to connect!");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $escaped_user_name = mysqli_real_escape_string($con, $user_name); // Escape user input

        // Read from the database using prepared statement
        $query = "SELECT * FROM users WHERE user_name = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 's', $escaped_user_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // Verify the password using password_verify() if passwords are stored hashed
            if ($user_data['password'] === $password) { // Note: This assumes passwords are not hashed
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                exit; // Use exit instead of die
            }
        }
    }
}
?>
