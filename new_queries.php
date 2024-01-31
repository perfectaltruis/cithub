<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Queries</title>
    <link rel="stylesheet" href="newquery.css">
</head>
<body>
    <div class="container">
        <div class="sidenav">
            <a href="dashboard.php">Profile</a><br>
            <a href="display_queries.php">Display Queries</a><br>

            <p><a href="logout.php">Logout</a></p><br>
            <a href="index.html">Home</a><br>


        </div>

        <div class="main-content">
            <div class="main-container new-queries">
                <h2>New Queries</h2>
                <form action="process_queries.php" method="post" class="query-form">
                    <label for="title">Title:</label>
                    <input type="text" name="title" required><br>

                    <label for="description">Description:</label>
                    <textarea name="description" rows="4" required></textarea><br>

                    <label for="category">Category:</label>
                    <select name="category" required>
                        <option value="infrastructure">Infrastructure</option>
                        <option value="healthcare">Healthcare</option>
                        <option value="education">Education</option>
			<option value="technology">Technology</option>
                        <option value="environments">Environmental</option>
                        <option value="economics">Economics</option>

                    </select><br>
                    <label for="region">Region:</label>
                    <input type="text" name="region" required>
                    <input type="submit" value="Submit Query">
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y"); ?> web technologies: All right reserved.
    </div>
</body>
</html>
