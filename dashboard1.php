<?php
session_start();
include_once("db_connection.php");

// Check if the user is logged in, else redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch queries for the representative's region
$user_id = $_SESSION['user_id'];
$representative_query = "SELECT * FROM representatives WHERE id = $user_id";
$representative_result = $conn->query($representative_query);

if ($representative_result->num_rows > 0) {
    $representative_row = $representative_result->fetch_assoc();
    $region = $representative_row['region'];

    // Fetch queries for the representative's region
    $queries_query = "SELECT * FROM queries WHERE region = '$region' ORDER BY created_at DESC";
    $queries_result = $conn->query($queries_query);
} else {
    // Handle the case where representative information is not found
    // You can set default values or redirect as needed
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Representative Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <div class="sidenav">
            <a href="dashboard1.php">Home</a>
            <!-- Add more links as needed -->
            <p><a href="logout.php">Logout</a></p>
        </div>

        <div class="main-content">
            <h2>Welcome to the Dashboard, <?php echo $representative_row['username']; ?>!</h2>
            <p>Region: <?php echo $region; ?></p>

            <!-- Display queries for the representative's region -->
            <h3>Queries for <?php echo $region; ?></h3>
            <?php
            if ($queries_result && $queries_result->num_rows > 0) {
                while ($query_row = $queries_result->fetch_assoc()) {
                    echo "<div class='query-item'>";
                    echo "<h4>{$query_row['title']}</h4>";
                    echo "<p>{$query_row['description']}</p>";
                    echo "<a href='response_page.php?query_id={$query_row['id']}'>Respond to Query</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No queries in this region.</p>";
            }
            ?>
        </div>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y"); ?> 
    </div>
</body>
</html>
