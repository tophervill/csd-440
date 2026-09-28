<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M8.2 - Query Table</title>
    <link rel="stylesheet" href="basic.css">
</head>
<body>

<h1>Module 8 Programming Assignment</h1>
<h2>Query Table PHP</h2>

<?php

$host = "localhost";
$username = "student1";
$password = "pass";
$database = "baseball_01";

$connection = new mysqli($host, $username, $password, $database );

# Check database connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

echo "<p class='welcome'>Hello, $username. You have successfully connected to <strong>$database</strong> database!</p>";

$sql = "SELECT * FROM christopher_games";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Game Name</th>";
    echo "<th>Genre</th>";
    echo "<th>Release Year</th>";
    echo "<th>Story Completed</th>";
    echo "<th>Platform</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($result)) {

        if ($row["story_completed"] == 1) {
            $completed = "Yes";
        } else {
            $completed = "No";
        }

        echo "<tr>";
        echo "<td>" . $row["game_id"] . "</td>";
        echo "<td>" . $row["game_name"] . "</td>";
        echo "<td>" . $row["genre"] . "</td>";
        echo "<td>" . $row["release_year"] . "</td>";
        echo "<td>" . $completed . "</td>";
        echo "<td>" . $row["platform"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "<p class='message error'>No gaming records were found.</p>";
}

mysqli_close($connection);

?>

<ul class="directory">
    <li>
        <a href='ChristopherIndex.php'>Home</a>
    </li>
    <li>
        <a href="ChristopherCreateTable.php">Create Table</a>
    </li>
    <li>
        <a href="ChristopherDropTable.php">Drop Table</a>
    </li>
    <li>
        <a href="ChristopherPopulateTable.php">Populate Table</a>
    </li>
    <li>
        <a href="ChristopherQueryTable.php">Query Table</a>
    </li>
</ul>

</body>
</html>