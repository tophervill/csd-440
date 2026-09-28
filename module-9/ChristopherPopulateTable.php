<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M8.2 - Populate Table</title>
    <link rel="stylesheet" href="basic.css">
</head>
<body>

<h1>Module 8 Programming Assignment</h1>
<h2>Populate Table PHP</h2>

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

$sql = "INSERT INTO christopher_games
        (game_name, genre, release_year, story_completed, platform)
        VALUES
        ('Kingdom Hearts', 'Action RPG', 2002, 1, 'PC / PlayStation 2'),
        ('Kingdom Hearts II', 'Action RPG', 2005, 1, 'PC / PlayStation 2'),
        ('Kingdom Hearts III', 'Action RPG', 2019, 1, 'PC'),
        ('Final Fantasy XIV', 'MMORPG', 2013, 1, 'PC'),
        ('Marvel''s Spider-Man: Miles Morales', 'Action-Adventure', 2020, 1, 'PC'),
        ('SMITE', 'MOBA', 2014, 0, 'PC'),
        ('New World: Aeternum', 'Action RPG / MMORPG', 2021, 1, 'PC'),
        ('Halo: The Master Chief Collection', 'First-Person Shooter', 2014, 1, 'PC')";

if (mysqli_query($connection, $sql)) {
    echo "<p class='message success'>Gaming Records were successfully inserted.</p>";
} else {
    echo "<p class='message error'>";
    echo "Error populating table: " . mysqli_error($connection);
    echo "<br/><br/>";
    echo "If the table does not exist, create it first. <a href='ChristopherCreateTable.php'>Create Table</a>";
    echo "</p>";
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