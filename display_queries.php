<?php
// Include your database connection file
include_once("db_connection.php");

// Function to get queries based on category
function getQueriesByCategory($conn, $category) {
    $category = mysqli_real_escape_string($conn, $category);

    $query = "SELECT * FROM queries WHERE category = '$category' ORDER BY created_at DESC";
    $result = $conn->query($query);

    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array(); // Return an empty array if there are no queries
    }
}

// Fetch categories from the database (customize this query based on your actual categories)
$categoryQuery = "SELECT DISTINCT category FROM queries";
$categoriesResult = $conn->query($categoryQuery);

if ($categoriesResult) {
    $categories = $categoriesResult->fetch_all(MYSQLI_ASSOC);
} else {
    $categories = array();
}

// Fetch and organize queries for each category
$allQueries = array();
foreach ($categories as $categoryItem) {
    $category = $categoryItem['category'];
    $queries = getQueriesByCategory($conn, $category);
    $allQueries[$category] = $queries;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Queries with Tabs</title>
    <link rel="stylesheet" type="text/css" href="querydisplay.css">
    <style>
        /* Add tab styling here */
        .tab {
            cursor: pointer;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
    <script>
        // JavaScript for tab functionality
        function showCategory(category) {
            // Hide all queries
            var querySections = document.getElementsByClassName("category-section");
            for (var i = 0; i < querySections.length; i++) {
                querySections[i].style.display = "none";
            }

            // Show queries for the selected category
            var selectedCategorySection = document.getElementById("category-section-" + category);
            if (selectedCategorySection) {
                selectedCategorySection.style.display = "block";
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="sidenav">
            <!-- Navigation links go here -->
        
            <a href="dashboard.php">Home</a> <br>
            <a href="new_queries.php">New Queries</a><br>
            <a href="display_queries.php">Display Queries</a><br>
            <!-- Add more links as needed -->
            <p><a href="logout.php">Logout</a></p>
        </div>
     

        <div class="main-content">
            <h2>Queries by Category</h2>

            <!-- Tabs for each category -->
            <div class="tab" onclick="showCategory('All')">All</div>
            <?php foreach ($categories as $categoryItem): ?>
                <div class="tab" onclick="showCategory('<?php echo $categoryItem['category']; ?>')">
                    <?php echo $categoryItem['category']; ?>
                </div>
            <?php endforeach; ?>

            <?php foreach ($categories as $categoryItem): ?>
                <div id="category-section-<?php echo $categoryItem['category']; ?>" class="category-section" style="display: none;">
                    <h3><?php echo $categoryItem['category']; ?></h3>

                    <?php
                    $category = $categoryItem['category'];
                    $queries = $allQueries[$category];
                    if (empty($queries)) {
                        echo "<p>No queries in this category.</p>";
                    } else {
                        foreach ($queries as $query):
                    ?>
                        <div class="query-item">
                            <h4><?php echo $query['title']; ?></h4>
                            <p><?php echo $query['description']; ?></p>
                            <!-- Additional query details can be displayed here -->
                            <a href="view_response.php?query_id=<?php echo $query['id']; ?>" class="view_response-btn">View Response</a>
                        </div>
                    <?php endforeach; ?>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y"); ?> 
    </div>
</body>
</html>
