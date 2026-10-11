<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Module 11 - PDFs in PHP</title>
        <link rel="stylesheet" href="basic.css">

        <script>
            function getPDF(){
                window.open("ChristopherPDF.php");
            }
        </script>
    </head>
    <body>
        <h1>Module 11 - PDFs in PHP</h1>

        <p>
            The button below will generate a PDF containing all gaming records from the Module 8 database.
        </p>

        <button onclick="getPDF();" target="_blank">Generate PDF</button>

    </body>