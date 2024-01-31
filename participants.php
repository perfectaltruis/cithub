<?php
    // Include your database connection file
    include_once("db_connection.php");

    // Fetch group members from the database
    $membersQuery = "SELECT * FROM group_members";
    $membersResult = $conn->query($membersQuery);

    // Close the database connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web- Group Members</title>
    <link rel="stylesheet" type="text/css" href="participants.css">
<style>
	 /* CSS styles for table */
        table {
            width: 80%;
            margin: 20px auto;
            border-spacing: 0;
            border: 2px solid #333;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: teal;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        caption {
            text-align: left;
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        h2{
        color: teal;
        text-align: center;
	}
	p{
	color: #333;
	font-size: 20px;
	text-align: center;
	}
</style>
</head>
<body>
    <header>
    <h2>Group Members</h2>
    </header>

     <p> Names and Registration number of group members can be found in this page!.</p>

	<p>Back to <a href="dashboard.php">Profile</a></p>

   <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Registration Number</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($member = $membersResult->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $member['id']; ?></td>
                    <td><?php echo $member['name']; ?></td>
                    <td><?php echo $member['registration_number']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
