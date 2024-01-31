<?php
// Include the database connection file
include_once 'db_connection.php';

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the representatives table to check if the username exists
    $query = "SELECT * FROM representatives WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $representative = mysqli_fetch_assoc($result);
        // Verify the password
        if (password_verify($password, $representative['password'])) {
            // Password is correct, create a session for the representative
            $_SESSION['representative_id'] = $representative['id'];
            $_SESSION['representative_username'] = $representative['username'];
            $_SESSION['representative_region'] = $representative['region'];
            // Redirect to the dashboard or any other page for representatives
            header("Location: representativedashboard.php");
            exit();
        } else {
            // Incorrect password
            $_SESSION['login_error'] = "Invalid username or password.";
            header("Location: representativeloginpage.php");
            exit();
        }
    } else {
        // No representative found with the given username
        $_SESSION['login_error'] = "Invalid username or password.";
        header("Location: representativeloginpage.php");
        exit();
    }
} else {
    // Redirect to the login page if accessed directly without form submission
    header("Location: representativeloginpage.php");
    exit();
}
?>
