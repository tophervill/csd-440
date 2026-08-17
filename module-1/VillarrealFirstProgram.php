<!DOCTYPE html>
<html lang='en'>
<!--
  Christopher Villarreal
  CSD440 - Server Side Scripting
 -->
<head>
    <title>CSD440 - Server Side Scripting</title>
    <meta charset='utf-8'>
</head>

<body>
    <h1>Module 1 - Assignment 3</h1>

    <h2>Strings</h2>
    <?php

    $firstName = "Christopher";
    $lastNameInitial = "V.";
    $favoriteAnime = "My Hero Academia";

    echo "Hello, my name is <strong>$firstName $lastNameInitial</strong>!";
    print '<br/>';
    echo "My anime that is currently my favorite is, <strong> $favoriteAnime </strong>";
    ?>

    <h2>Math Equation Time</h2>
    <?php

    $number1 = 75;
    $number2 = 25;

    $sum = $number1 + $number2;
    $subtract = $number1 - $number2;

    echo "The sum of $number1 and $number2 is: <strong>" . $sum . '</strong>';
    echo '<br/>';
    echo "The subraction of $number1 and $number2 is: <strong>" . $subtract . '</strong>';

    ?>
</body>

</html>