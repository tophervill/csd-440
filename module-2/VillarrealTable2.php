<!DOCTYPE html>
<html lang='en'>
<!--
  Christopher Villarreal
  Module 2 Assignment 2
  CSD440 - Server-Side Scripting
 -->
<head>
    <title>CSD440 - Server Side Scripting</title>
    <meta charset='utf-8'>
</head>

<body>
<h1>Module 2 - Assignment 2</h1>

<h2>Table Loops</h2>
<table border='1' width='500'>
    <caption>
        Simple Table - Random Numbers!
    </caption>
    <thead>
        <tr>
            <td colspan='5'>
                Two-dimensional Table - Random Numbers
            </td>
        </tr>
    </thead>

    <tbody>
    <?php for($i = 0; $i < 5; ++$i){ ?>
        <tr>
            <?php for($j = 0; $j < 5; ++$j){ ?>

            <td>
                <?php echo(rand(1, 99)); ?>
            </td>

            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>

</html>