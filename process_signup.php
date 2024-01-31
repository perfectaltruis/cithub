<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
    <h2>Signup</h2>

<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $region = $_POST["region"];

    // Sanitize and validate data (add your own validation logic)

    // Check if the username already exists
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // Username already exists, inform the user
        echo "Username is already registered.";
    } else {
        // Username is not registered, proceed with registration
        // Insert data into the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO users (username, password, region) VALUES ('$username', '$hashed_password', '$region')";
        $result = $conn->query($insert_query);

        if ($result) {
            // Redirect to login page after successful registration
            header("Location: process_login.php");
            exit();
        } else {
            echo "Error inserting user: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to signup page if accessed directly
    header("Location: signup.html");
    exit();
}
?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="region">Region:</label>
        <input type="text" id="region" name="region" list="regions" required>
        <datalist id="regions">
            <!-- List of Tanzanian regions -->
            <option value="Arusha">
            <option value="Dar es Salaam">
            <option value="Dodoma">
            <!-- Add more regions as needed -->
        </datalist>
        <br>
        <input type="submit" value="Signup">

        <p>Already registered? <a href="process_login.php">Login here</a></p>
    </form>
    </div>
</body>
</html>
