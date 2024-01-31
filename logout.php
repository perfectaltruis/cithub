<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: index.html");
exit();
?>
<!-- logout_success.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Successful</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your stylesheet if needed -->
</head>
<body>
    <div class="logout-container">
        <h2>Logout Successful</h2>
        <p>You have been successfully logged out. <a href="index.html">Login again</a></p>
    </div>
</body>
</html>
