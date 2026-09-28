<!DOCTYPE html>
<!-- 
    Christopher Villarreal
    CSD 440 - Server-Side Scripting
    Module 9 Assignment
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CSD440 - Module 9 Assignment</title>
        <link rel="stylesheet" href="basic.css">
    </head>
    <body>

    <h1>Module 9 Programming Assignment</h1>

    <?php

    $host = "localhost";
    $username = "student1";
    $password = "pass";
    $database = "baseball_01";

    $connection = new mysqli($host, $username, $password, $database );

    # Check database connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } else {
        echo "<p class='welcome'>Hello, $username. You have successfully connected to <strong>$database</strong> database!</p>";
    }

    ?>

    <h2>Module 9 Assignment Files</h2>
    <ul>
        <li>
            <a href="ChristopherQuery.php">Query Page</a>
        </li>
        <li>
            <a href="ChristopherForm.php">Form Page</a>
        </li>
    </ul>

    <h2>Module 8 Assignment Files</h2>
    <ul>
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