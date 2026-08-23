<!DOCTYPE html>
<html lang='en'>
    <!--
      Christopher Villarreal
      Module 3 Assignment 2
      CSD440 - Server-Side Scripting
     -->
    <head>
        <title>CSD440 - Server Side Scripting</title>
        <meta charset='utf-8'>

        <!-- PHP Required Function -->
        <?php
        require('Villarreal_Fun_01.php');
        ?>

        <!-- Styles for readability -->
        <style>
            table {
                border-collapse: collapse;
            }
            th, td {
                border: 2px solid black;
                padding: 8px 12px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Module 3 - Assignment 2</h1>

        <h2>More Table Loops</h2>
        <table>
            <thead>
                <tr>
                    <th>Number 1</th>
                    <th>Number 2</th>
                    <th colspan="2">Sum</th>
                </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < 10; $i++){
                $value1 = rand(1, 99);
                $value2 = rand(1, 99);
                $sum = calculateSum($value1, $value2);
            ?>
                <tr>
                    <td><?php echo $value1 ?></td>
                    <td><?php echo $value2 ?></td>
                    <td><?php echo $sum ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </body>
</html>