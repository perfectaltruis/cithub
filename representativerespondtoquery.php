<?php
// Include your database connection file
include_once("db_connection.php");

// Retrieve the query ID from the URL
$query_id = $_GET['query_id'];

// Fetch the query details from the database
$query = "SELECT * FROM queries WHERE id = $query_id";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Display the query details
    echo "<h2>{$row['title']}</h2>";
    echo "<p>{$row['description']}</p>";

    // Display a form for the representative to submit their response
    echo "<form action='process_response.php' method='post'>";
    echo "<input type='hidden' name='query_id' value='$query_id'>";
    echo "<textarea name='response_text' rows='5' cols='50'></textarea><br>";
    echo "<input type='submit' value='Submit Response'>";
    echo "</form>";
} else {
    echo "Query not found.";
}
?>
