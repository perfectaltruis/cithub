<?php
session_start();

// Check if the user is logged in, else redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include_once("db_connection.php");

    // Get form data
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $region = $_POST['region']; // Assuming you have a region input in your form

    // You should perform proper validation and sanitization here

    // Insert data into the database (replace with your actual database query)
    $query = "INSERT INTO queries (user_id, title, description, category, region) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        // Check for errors in the SQL statement
        die('Error in prepare statement: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("issss", $user_id, $title, $description, $category, $region);

    if ($stmt->execute()) {
        // Query successful
        header("Location: new_queries.php?success=true");
        exit();
    } else {
        // Query failed
        header("Location: new_queries.php?success=false");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: new_queries.php");
    exit();
}
?>
