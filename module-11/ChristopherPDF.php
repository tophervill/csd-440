<?php

$connection = new mysqli("localhost", "student1", "pass", "baseball_01");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM christopher_games ORDER BY game_id";

$result = mysqli_query($connection, $sql);

if (!$result) {
    die("ERROR in SQL - Query failed: " . mysqli_error($connection));
}

require('fpdf19/fpdf.php');

// Create PDF in landscape orientation
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

// PDF Title
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 12, "Christopher's Games", 0, 1, 'C');
$pdf->Ln(5);

// General information about the topic
$pdf->SetFont('Arial', '', 11);

$description = "This PDF contains a collection of just a few of my favorite videos games. The information displayed includes the game name, genre, release year, completion status, and platform. The table is the same from Module 8.";

$pdf->MultiCell(0, 7, $description);
$pdf->Ln(8);

// Table header
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(220, 220, 220);

$widths = [12, 88, 45, 28, 38, 53]; // Column widths for the table

$pdf->Cell($widths[0], 10, 'ID', 1, 0, 'C', true);
$pdf->Cell($widths[1], 10, 'Game Name', 1, 0, 'C', true);
$pdf->Cell($widths[2], 10, 'Genre', 1, 0, 'C', true);
$pdf->Cell($widths[3], 10, 'Year', 1, 0, 'C', true);
$pdf->Cell($widths[4], 10, 'Completed', 1, 0, 'C', true);
$pdf->Cell($widths[5], 10, 'Platform', 1, 1, 'C', true);

// Display database records
$pdf->SetFont('Arial', '', 9);

$totalGames = 0;

while ($row = mysqli_fetch_array($result)) {

    // Converts the story_completed field from 1/0 to Yes/No for display in the PDF
    if ($row["story_completed"] == 1) {
        $completed = "Yes";
    } else {
        $completed = "No";
    }

    // Display each database field in the PDF table
    $pdf->Cell($widths[0], 10, $row["game_id"], 1, 0, 'C');
    $pdf->Cell($widths[1], 10, $row["game_name"], 1);
    $pdf->Cell($widths[2], 10, $row["genre"], 1);
    $pdf->Cell($widths[3], 10, $row["release_year"], 1, 0, 'C');
    $pdf->Cell($widths[4], 10, $completed, 1, 0, 'C');
    $pdf->Cell($widths[5], 10, $row["platform"], 1, 1);

    $totalGames++;
}

// Table footer displaying total records
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(array_sum($widths), 10, "Total Games: " . $totalGames, 1, 1, 'R');

// Close the database connection and output the PDF
$connection->close();
$pdf->Output();

?>