<!-- representativedashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Representative Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">

	<?php
        session_start();
        if (isset($_SESSION['representative_username'])) {
            echo "<h2>Welcome, " . $_SESSION['representative_username'] . "!</h2>";
        } else {
            echo "<h2>Welcome, Representative!</h2>";
        }
        ?>
        <p>This is your dashboard. You can navigate to view queries and responses:</p>
        <ul>
            <li><a href="display_queries_for_representatives.php">View Queries</a></li>
        </ul>
        <p><a href="representativelogout.php">Logout</a></p>
    </div>
</body>
</html>
