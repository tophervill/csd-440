<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christopher Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Pet Information Form</h1>

        <?php


        // Collect data and store into an array
        $results = [
            'first_name' => $_POST['fname'] ?? '',
            'last_name' => $_POST['lname'] ?? '',
            'pet_name' => $_POST['petname'] ?? '',
            'pet_type' => $_POST['pettype'] ?? '',
            'pet_age' => $_POST['petage'] ?? '',
            'pet_color' => $_POST['petcolor'] ?? '',
            'pet_weight' => $_POST['petweight'] ?? '',
            'pet_breed' => $_POST['petbreed'] ?? '',
            'pet_vaccinated' => isset($_POST['petvaccinated']) ? 'Yes' : 'No',
            'pet_friendly' => isset($_POST['petfriendly']) ? 'Yes' : 'No',
            'pet_notes' => $_POST['petnotes'] ?? ''
        ];

        // Check that all required fields contain data
        if (
            empty($results['first_name']) ||
            empty($results['last_name']) ||
            empty($results['pet_name']) ||
            empty($results['pet_type']) ||
            empty($results['pet_age']) ||
            empty($results['pet_color']) ||
            empty($results['pet_weight']) ||
            empty($results['pet_breed'])
        ) {
            echo "<p class='message error'>Error: Please fill in all required fields.</p>";
            echo "<a class='link-button' href='ChristopherForm.php'>Back to Form</a>";
            exit;
        } else {

            echo "<p class='message success'>All fields are filled.</p>";

            // Encodes the array into JSON format with pretty print
            $json = json_encode($results, JSON_PRETTY_PRINT);

            // Display the JSON data
            echo "<h3>Submitted Data in JSON Format</h3>";
            echo "<pre>" . $json . "</pre>";
            echo '<br />';

            // Decode the JSON data back into an associative array
            $json_obj = json_decode($json, true);
            echo "<h3>Submitted Data in Table Format</h3>";

            echo '<table>';
            echo '<tr>';
            echo '<th>Key</th>';
            echo '<th>Value</th>';
            echo '</tr>';

            // Loop through the array and display the key-value pairs in a table
            foreach ($json_obj as $key => $value) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($key) . '</td>';
                echo '<td>' . htmlspecialchars($value) . '</td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '<br />';

        }

        echo "<a class='link-button' href='ChristopherForm.php'>Back to Form</a>";

        ?>


    </div>
</body>
</html>
