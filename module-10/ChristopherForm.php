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
        <form action="ChristopherJSON.php" method="POST">
            <div class="form-wrapper">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" required>

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" required>

                <hr/>

                <label for="petname">Pet Name</label>
                <input type="text" id="petname" name="petname" required>

                <label for="pettype">Pet Type</label>
                <select id="pettype" name="pettype" required>
                    <option value="">Select a pet type</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="bird">Bird</option>
                    <option value="other">Other</option>
                </select>

                <label for="petage">Pet Age</label>
                <input type="number" id="petage" name="petage" min="0" required>

                <label for="petcolor">Pet Color</label>
                <input type="text" id="petcolor" name="petcolor" required>

                <label for="petweight">Pet Weight (lbs)</label>
                <input type="number" id="petweight" name="petweight" min="0" required>

                <label for="petbreed">Pet Breed</label>
                <input type="text" id="petbreed" name="petbreed" required>

                <label>Other Pet Information</label>
                <div class="checkbox-group">
                    <input type="checkbox" id="petvaccinated" name="petvaccinated">
                    <label for="petvaccinated">My pet is vaccinated</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="petfriendly" name="petfriendly">
                    <label for="petfriendly">My pet is friendly</label>
                </div>

                <hr/>

                <label for="petnotes">Additional Notes</label>
                <textarea id="petnotes" name="petnotes" rows="4"></textarea>

                <div class="button-group">
                    <button type="submit">Submit</button>
                    <button type="reset">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>