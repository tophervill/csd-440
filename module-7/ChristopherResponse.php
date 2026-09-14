<!DOCTYPE html>
<html lang="en">

<!--
  Christopher Villarreal
  Module 7 Assignment 2 - PHP Forms
-->

<head>
    <meta charset="UTF-8">
    <title>Christopher Gaming Form Response</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<?php

// Get submitted form information.
$name = $_POST["name"];
$age = $_POST["age"];
$favoriteGame = $_POST["favoriteGame"];
$platform = $_POST["platform"];
$reason = $_POST["reason"];

$error = "";

// Verify that the name was entered.
if(empty($name)) {
    $error = "Please enter your name.";
}
// Verify that the age was entered correctly.
else if(empty($age)) {
    $error = "Please enter your age.";
}
else if(!is_numeric($age) || $age <= 0) {
    $error = "Please enter a valid age.";
}

// Verify that a favorite game was entered.
else if(empty($favoriteGame)) {
    $error = "Please enter your favorite game.";
}
// Verify that a gaming platform was selected.
else if(empty($platform)) {
    $error = "Please select your favorite gaming platform.";
}
// Verify that a game type was selected.
else if(empty($_POST["gameType"])) {
    $error = "Please select your preferred game type.";
}
// Verify that at least one game genre was selected.
else if(empty($_POST["genres"])) {
    $error = "Please select at least one game genre.";
}
// Verify that a reason was entered.
else if(empty($reason)) {
    $error = "Please explain why your favorite game is your favorite.";
}

// Display an error if information was missing or incorrect.
if($error != "") {
    print("<h1>Gaming Form Error</h1>");
    print("<div class='message'>ERROR: ");
    print("<p class='error'>$error</p>");
    print("<p class='instructions'>Please return to the form and correct the problem.</p>");
    print("</div>");
}

// Display the information if all fields were entered correctly.
else {

    $gameType = $_POST["gameType"];

    print("<h1>Your Gaming Interests</h1>");

    print("<table>");

    print("<tr>");
    print("<th>Name</th>");
    print("<td>$name</td>");
    print("</tr>");

    print("<tr>");
    print("<th>Age</th>");
    print("<td>$age</td>");
    print("</tr>");

    print("<tr>");
    print("<th>Favorite Game</th>");
    print("<td>$favoriteGame</td>");
    print("</tr>");

    print("<tr>");
    print("<th>Favorite Platform</th>");
    print("<td>$platform</td>");
    print("</tr>");

    print("<tr>");
    print("<th>Preferred Game Type</th>");
    print("<td>$gameType</td>");
    print("</tr>");

    print("<tr>");
    print("<th>Favorite Game Genres</th>");
    print("<td>");

    foreach($_POST["genres"] as $genre) {

        print("$genre<br>");
    }

    print("</td>");
    print("</tr>");

    print("<tr>");
    print("<th>Why You Like Your Favorite Game</th>");
    print("<td>$reason</td>");
    print("</tr>");

    print("</table>");
}

?>

    <a href="ChristopherForm.html">Return to Form </a>

</body>

</html>