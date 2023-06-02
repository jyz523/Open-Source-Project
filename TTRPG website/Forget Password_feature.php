<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // User has submitted the form
    $username = $_POST['username'];

    if (!empty($username)) {
        // Query the database for user details
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // User exists, retrieve password
            $user_data = mysqli_fetch_assoc($result);
            $password = $user_data['password'];

            // Display the password in a pop-up box using JavaScript
            echo "<script>alert('Your password is: $password');</script>";
        } else {
            // User does not exist, display error message in a pop-up box
            echo "<script>alert('Username not found! Please enter a valid username.');</script>";
        }
    } else {
        // Invalid input
        echo "<script>alert('Please enter a valid username!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forget Password</title>
    <style type="text/css">
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }

        #box {
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Forget Password</div>

            <input id="text" type="text" name="username" placeholder="Enter your username"><br><br>
            <input id="button" type="submit" value="Submit"><br><br>
        </form>

        <a href="http://IP Address or localhost/">Go back</a>
    </div>
</body>
</html>
