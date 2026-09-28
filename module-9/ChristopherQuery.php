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
        <title>M9.2 - Query Games</title>
        <link rel="stylesheet" href="basic.css">
    </head>
    <body>

        <h1>Module 9 Programming Assignment</h1>
        <h2>Search Games by Genre</h2>

        <?php

        $host = "localhost";
        $username = "student1";
        $password = "pass";
        $database = "baseball_01";

        $connection = new mysqli($host, $username, $password, $database);

        # Check database connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        echo "<p class='welcome'>Hello, $username. You have successfully connected to <strong>$database</strong> database!</p>";

        # Get each unique genre from the gaming table
        $sql = "SELECT DISTINCT genre
                FROM christopher_games
                ORDER BY genre";

        $genreResult = mysqli_query($connection, $sql);

        ?>

        <!-- Form used to search for games by genre -->
        <form action="ChristopherQuery.php" method="POST">

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" list="genres" placeholder="Select or enter a genre" required>

            <datalist id="genres">

                <?php

                while ($row = mysqli_fetch_array($genreResult)) {
                    echo "<option value='" . $row["genre"] . "'>";
                }

                ?>

            </datalist>

            <input type="submit" value="Search">

        </form>

        <?php

        # Check if the search form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $genre = $_POST["genre"];

            # Search for games matching the selected genre
            $sql = "SELECT * FROM christopher_games WHERE genre = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $genre);
            $stmt->execute();

            $searchResult = $stmt->get_result();

            if (mysqli_num_rows($searchResult) > 0) {

                echo "<h2>Search Results</h2>";

                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Game Name</th>";
                echo "<th>Genre</th>";
                echo "<th>Release Year</th>";
                echo "<th>Story Completed</th>";
                echo "<th>Platform</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_array($searchResult)) {

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
                echo "<p class='message error'>No games were found for that genre.</p>";
            }

            $stmt->close();
        }

        mysqli_close($connection);

        ?>

        <ul class="directory">
            <li>
                <a href="ChristopherIndex.php">Home</a>
            </li>
            <li>
                <a href="ChristopherQuery.php">Search Games</a>
            </li>
            <li>
                <a href="ChristopherForm.php">Add Game</a>
            </li>
            <li>
                <a href="ChristopherQueryTable.php">View All Games</a>
            </li>
        </ul>

    </body>
</html>