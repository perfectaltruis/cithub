<!-- db_connection.php -->

<?php
$host = "localhost";
$username_db = "root";
$password_db = "";
$database = "citi_db";

// Create database connection
$conn = new mysqli($host, $username_db, $password_db, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
