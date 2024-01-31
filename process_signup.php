<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $region = $_POST["region"];

    // Sanitize and validate data (add your own validation logic)

    // Insert data into the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insert_query = "INSERT INTO users (username, password, region) VALUES ('$username', '$hashed_password', '$region')";
    $result = $conn->query($insert_query);

    if ($result) {
        // Redirect to login page after successful registration
        header("Location: index.html");
        exit();
    } else {
        echo "Error inserting user: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to signup page if accessed directly
    header("Location: signup.html");
    exit();
}
?>
