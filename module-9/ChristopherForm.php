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
        <title>M9.2 - Add Game Form</title>
        <link rel="stylesheet" href="basic.css">
    </head>
    <body>

        <h1>Module 9 Programming Assignment</h1>
        <h2>Add a Game</h2>

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

        # Check if the form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $gameName = $_POST["game_name"];
            $genre = $_POST["genre"];
            $releaseYear = $_POST["release_year"];
            $storyCompleted = $_POST["story_completed"];
            $platform = $_POST["platform"];

            # Insert the new gaming record
            $sql = "INSERT INTO christopher_games
                    (game_name, genre, release_year, story_completed, platform)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = $connection->prepare($sql);

            $stmt->bind_param(
                "ssiis",
                $gameName,
                $genre,
                $releaseYear,
                $storyCompleted,
                $platform
            );

            if ($stmt->execute()) {
                echo "<p class='message success'>Game was successfully added.</p>";
            } else {
                echo "<p class='message error'>Error adding game: " . $stmt->error . "</p>";
            }

            $stmt->close();
        }

        # Get the available genres from the gaming table
        $genreSql = "SELECT DISTINCT genre FROM christopher_games ORDER BY genre";

        $genreResult = mysqli_query($connection, $genreSql);

        # Get the available platforms from the gaming table
        $platformSql = "SELECT DISTINCT platform FROM christopher_games ORDER BY platform";

        $platformResult = mysqli_query($connection, $platformSql);

        ?>

        <!-- Form used to add a new game -->
        <form action="ChristopherForm.php" method="POST">

            <label for="game_name">Game Name:</label><br>
            <input type="text" id="game_name" name="game_name" placeholder="Enter the game name" required>

            <label for="genre">Genre:</label><br>
            <input type="text" id="genre" name="genre" list="genres" placeholder="Select or enter a genre" required>

            <datalist id="genres">

                <?php

                while ($row = mysqli_fetch_array($genreResult)) {
                    echo "<option value='" . $row["genre"] . "'>";
                }

                ?>

            </datalist>

            <br>
            <small>
                Select an existing genre or enter a new one.
            </small>

            <label for="release_year">Release Year:</label><br>
            <input type="number" id="release_year" name="release_year" min="1950" max="2100" placeholder="Example: 2026" required>

            <label for="story_completed">Story Completed:</label><br>
            <select id="story_completed" name="story_completed" required>
                <option value="">Select an Option</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>

            <br>
            <small>
                Select whether you have completed the game's story.
            </small>

            <label for="platform">Platform:</label><br>
            <input type="text" id="platform" name="platform" list="platforms" placeholder="Select or enter a platform" required>

            <datalist id="platforms">

                <?php

                while ($row = mysqli_fetch_array($platformResult)) {
                    echo "<option value='" . $row["platform"] . "'>";
                }

                ?>

            </datalist>

            <br>
            <small>
                Select an existing platform or enter a new one.
            </small>

            <input class="form-button" type="submit" value="Add Game">
            <input class="form-button" type="reset" value="Reset Form">

        </form>

        <?php

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