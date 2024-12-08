<?php
require('./pdfFlie/fpdf.php'); // Make sure the path is correct

// Database connection
include "./database/conn.php";

$currentDate=Date("Y-m-d");
// Fetch customer data
$query = "SELECT * FROM customers ORDER BY id DESC";
$result = mysqli_query($conn, $query);

// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'Customer List', 0, 1, 'C');
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(0, 8, " Date : $currentDate", 0, 1, 'A');

// Table header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(80, 10, 'Customer Name', 1);
$pdf->Cell(80, 10, 'Phone Number', 1);

$pdf->Ln();

// Table data
$pdf->SetFont('Arial', '', 10);
$count=1;
while ($data = mysqli_fetch_assoc($result)) {
    $pdf->Cell(20, 8, $count, 1);
    $pdf->Cell(80, 8, $data['customerName'], 1);
    $pdf->Cell(80, 8, $data['phoneNumber'], 1);
    $pdf->Ln();
    $count++;
}

// Output the PDF
$pdf->Output('I', "customer_list $currentDate.pdf"); // D for download
?>