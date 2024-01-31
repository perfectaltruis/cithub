<!-- dashboard.php -->

<?php
session_start();

// Include database connection
include_once("db_connection.php");

// Check if the user is logged in, else redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Get user information from the database
$user_id = $_SESSION['user_id'];
$user_query = "SELECT username FROM users WHERE id = $user_id";
$user_result = $conn->query($user_query);

if ($user_result->num_rows > 0) {
    $user_row = $user_result->fetch_assoc();
    $username = $user_row['username'];
} else {
    // Handle the case where user information is not found
    $username = "User";
}

// Get the number of queries from the database
$query_count_query = "SELECT COUNT(*) AS total_queries FROM queries";
$query_count_result = $conn->query($query_count_query);

if ($query_count_result->num_rows > 0) {
    $query_count_row = $query_count_result->fetch_assoc();
    $numberOfQueries = $query_count_row['total_queries'];
} else {
    // Handle the case where query count is not found
    $numberOfQueries = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Dashboard</title>
    <link rel="stylesheet" href="dashboards.css">
</head>
<body>
    <div class="container">
        <div class="sidenav">
	    <a href="index.html">Home</a>
            <a href="logout.php" style="color: red">Log out</a>
            <a href="display_queries.php" style="color: black">All Queries</a>
            <a href="new_queries.php">Create a Query</a>
            <a href="participants.php">Group Members</a>
        </div>

        <div class="main-content">
            <h2><?php echo $username; ?>!, You're Back</h2>
            <div class="query-count">You've: <?php echo $numberOfQueries; ?> queries</div>
        </div>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y"); ?> web technologies: All right reserved.
    </div>
</body>
</html>
