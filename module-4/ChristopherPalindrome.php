<!DOCTYPE html>
<!--
    Christopher Villarreal
    CSD 440
    Module 4 - Assignment 2
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSD440 - M4.2 Palindrome</title>
    <style>
        h1,h2 { text-align: center; }
        main {
            width: 75%;
            margin: 0 auto;
        }
        .true {
            background-color: limegreen;
            padding: 3px;
        }
        .false {
            background-color: lightcoral;
            padding: 3px;
        }
    </style>
</head>
<body>
    <?php
    $multiStrings =["1441", "racecar", "car", "madam", "12345", "hello"];

    // Function to check if a string is a palindrome
    function isPalindrome($string): string
    {
        if (strrev($string) == $string){
            return "<b class='true'>is a palindrome</b><br/><hr/>";
        } else {
            return "<b class='false'>is not a palindrome</b><br/><hr/>";
        }
    }
    ?>
    <header>
        <h1>Module 4.2 - Palindrome</h1>
    </header>
    <main>
        <h2>Is it a palindrome?</h2>
        <?php foreach ($multiStrings as $key => $value) { ?>
        <p>The contents of $multiStrings[<?php echo $key; ?>] is: [<?php echo $value; ?>]</p>
        <p>If we use strrev() on [<?php echo $value; ?>], we get [<?php echo strrev($value); ?>]</p>
        <p>[<?php echo $value; ?>] <?php echo isPalindrome($value); ?></p>
        <?php } ?>
    </main>
</body>
</html>