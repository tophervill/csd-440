<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M8.2 - Drop Table</title>
    <link rel="stylesheet" href="basic.css">
</head>
<body>

<h1>Module 8 Programming Assignment</h1>
<h2>Drop Table PHP</h2>

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

$sql = "DROP TABLE IF EXISTS christopher_games";

if (mysqli_query($connection, $sql)) {
    echo "<p class='message success'>Gaming table dropped successfully.</p>";
} else {
    echo "<p class='message error'>Error dropping table: " . mysqli_error($connection) . "</p>";
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