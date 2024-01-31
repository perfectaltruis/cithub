<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Your existing styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .container h2 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin: 10px 0;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #555;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome Back</h2>
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
                        echo "<p class='error-message'>Incorrect password</p>";
                    }
                } else {
                    echo "<p class='error-message'>User not found</p>";
                }
            }

            // Close the database connection
            $conn->close();
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </div>

    <div>
        <p>Not registered yet? <a href="signup.html">Signup here</a></p>
    </div>
    <div class="footer">
    </div>
</body>
</html>
