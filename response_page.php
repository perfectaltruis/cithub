<?php
session_start();
include_once("db_connection.php");

// Check if the user is logged in, else redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch query details based on query_id from the URL
$query_id = isset($_GET['query_id']) ? $_GET['query_id'] : null;
$query_result = null;

if ($query_id) {
    $query_id = intval($query_id);
    $query_query = "SELECT * FROM queries WHERE id = $query_id";
    $query_result = $conn->query($query_query);
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Response</title>
    <link rel="stylesheet" href="response.css">
</head>
<body>
    <!-- Display the fetched query details -->
    <?php if ($query_result && $query_result->num_rows > 0) : ?>
        <?php $query = $query_result->fetch_assoc(); ?>
        <form action="process_response.php" method="post">
            <input type="hidden" name="query_id" value="<?php echo $query['id']; ?>">
            <label for="query_title">Query Title:</label>
            <input type="text" id="query_title" name="query_title" value="<?php echo $query['title']; ?>" readonly>
            <label for="query_description">Query Description:</label>
            <textarea id="query_description" name="query_description" readonly><?php echo $query['description']; ?></textarea>
            <label for="response_text">Your Response:</label>
            <textarea id="response_text" name="response_text" required></textarea>
            <input type="submit" value="Submit Response">
        </form>
    <?php else : ?>
        <p>Error fetching query details.</p>
    <?php endif; ?>
</body>
</html>
