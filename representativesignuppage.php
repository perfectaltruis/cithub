<?php
// signup.php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $region = $_POST['region'];

    // Insert representative data into the representatives table
    $query = "INSERT INTO representatives (username, password, region) VALUES ('$username', '$password', '$region')";
    if (mysqli_query($conn, $query)) {
        // Registration successful
        header("Location: representativeloginpage.php"); // Redirect to representativeloginpage.php
        exit();
    } else {
        // Registration failed
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    // Redirect to registration page if accessed directly
    header("Location: signup.html");
    exit();
}
?>
