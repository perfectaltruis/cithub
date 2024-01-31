<?php
// Include the database connection file
include_once 'db_connection.php';

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if representative ID is set in the session
    if(isset($_SESSION['representative_id'])) {
        $representative_id = $_SESSION['representative_id'];
    } else {
        // Redirect to the dashboard if representative ID is not set
        header("Location: representativedashboard.php");
        exit();
    }

    // Retrieve query ID and response text from the form
    $query_id = $_POST['query_id'];
    $response_text = $_POST['response_text'];

    // Insert response into the database
    $response_query = "INSERT INTO responses (query_id, representative_id, response_text) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($response_query);

    if (!$stmt) {
        // Handle the case where the prepare statement fails
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("iis", $query_id, $representative_id, $response_text);

    if ($stmt->execute()) {
        // Redirect to the representative's dashboard with success message
        header("Location: representativedashboard.php?success=true");
        exit();
    } else {
        // Handle the case where the response insertion fails
        header("Location: representativedashboard.php?success=false");
        exit();
    }

    $stmt->close();
} else {
    // Redirect to the representative's dashboard if accessed directly without form submission
    header("Location: representativedashboard.php");
    exit();
}
?>
