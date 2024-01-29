<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize and validate data (add your own validation logic)

    $login_query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($login_query);

    if ($result->num_rows > 0) {
        $user_row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user_row['password'])) {
            // Set session variable for the logged-in user
            $_SESSION['user_id'] = $user_row['id'];

            // Redirect to the user's dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}

// Close the database connection
$conn->close();
?>
