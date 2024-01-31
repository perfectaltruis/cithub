<?php
// database connection file
include_once("db_connection.php");

// Check if the query_id is set in the URL
if (isset($_GET['query_id'])) {
    $query_id = $_GET['query_id'];

    // Fetch query details
    $query_details_query = "SELECT * FROM queries WHERE id = $query_id";
    $query_details_result = $conn->query($query_details_query);

    if ($query_details_result->num_rows > 0) {
        $query_details = $query_details_result->fetch_assoc();

        // Fetch all responses for the given query
        $response_query = "SELECT * FROM responses WHERE query_id = $query_id";
        $response_result = $conn->query($response_query);

        // Close the database connection
        $conn->close();
    } else {
        // Handle the case where query details are not found
        // Redirect to an error page or display an error message
        header("Location: error.php");
        exit();
    }
} else {
    // Redirect to an error page or display an error message
    header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Response</title>
    <link rel="stylesheet" href="viewresponse.css">
</head>
<body>
    <div class="container">
        <div class="sidenav">
            <!-- Navigation links go here -->
            <a href="dashboard.php">Profile</a> <br>
            <a href="new_queries.php">New Queries</a><br>
            <a href="display_queries.php">Display Queries</a><br>
            <p><a href="logout.php">Logout</a></p>
            <a href="index.html">Home</a> <br>
        </div>

        <div class="main-content">
            <h2>Query Details</h2>

            <!-- Display query details -->
            <div class="query-details">
                <h3><?php echo $query_details['title']; ?></h3>
                <p><?php echo $query_details['description']; ?></p>
            </div>

            <h2>Response</h2>

            <!-- Display response details -->
            <?php if ($response_result->num_rows > 0): ?>
                <div class="response-details">
                    <?php while ($response = $response_result->fetch_assoc()): ?>
                        <p><?php echo $response['response_text']; ?></p>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>No response available for this query.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y"); ?> 
    </div>
</body>
</html>
