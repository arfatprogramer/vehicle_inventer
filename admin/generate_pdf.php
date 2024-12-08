<?php
require('./pdfFlie/fpdf.php'); // Include the FPDF library
include "./database/conn.php"; // Include your database connection

// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdfDate=date('Y-m-d');
$pdf->Cell(0, 10, "Vehicle Data Report $pdfDate", 0, 1, 'C');

// Add a line break
$pdf->Ln(10);

// Set font for the table
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Date', 1);
$pdf->Cell(50, 10, 'Vehicle Number', 1);
$pdf->Cell(50, 10, 'Customer Name', 1);
$pdf->Cell(50, 10, 'Status', 1);
$pdf->Ln();

// Fetch data from the database

$sql="SELECT * FROM vahicle ";
$search= $_GET['search'];
$date= $_GET['date'];
$filter= $_GET['filter'];

function findDate($arg) {
    $today = date("Y-m-d");
    
    if ($arg === "today") {
        return $today;
    } elseif ($arg === "yesterday") {
        return date("Y-m-d", strtotime("-1 day"));
    } elseif ($arg === "custom") {
        // Retrieve the custom date range from POST request
        $from = isset($_POST['from']) ? $_POST['from'] : '';
        $to = isset($_POST['to']) ? $_POST['to'] : '';
        
        // Validate the dates
        if (!empty($from) && !empty($to)) {
            return ['from' => $from, 'to' => $to];
        } 
    }elseif ($arg === "range") {
        // Retrieve the custom date range from POST request
        $from = date("Y-m-d", strtotime("-6 day"));
        $to = $today;
        
        // Validate the dates
        if (!empty($from) && !empty($to)) {
            return ['from' => $from, 'to' => $to];
        } 
    }
}

$searchDate=findDate($date);
//new logic implementation



if(!empty($search)){
    $sql=$sql."WHERE vahicleNumber LIKE '%$search%' OR CustomerName LIKE '%$search%' ";
    
}

if((!empty($filter))&&(!empty($search))){
    $sql=$sql."and status = $filter";
    
}elseif((!empty($filter))&&(empty($search))){
    $sql=$sql."where status = $filter";
    
}

// date filter 
if(is_array($searchDate)){
    if(empty($search) && empty($filter)){
        $sql=$sql."WHERE date BETWEEN '$searchDate[from]' AND '$searchDate[to]'";
       
    }else{
        $sql=$sql." AND date BETWEEN '$searchDate[from]' AND '$searchDate[to]'";
        
    }
}else{
     if(empty($search) && empty($filter)){
         $sql=$sql." WHERE date LIKE '$searchDate'";
    
        }else{
            
        $sql=$sql." and date LIKE '$searchDate'";
    }
}


$result = mysqli_query($conn, $sql);

// Set font for the data
$pdf->SetFont('Arial', '', 10);

// Loop through the data and add it to the PDF
while ($row = mysqli_fetch_assoc($result)) {
    $status='';
    if($row['status']==1){
        $status='Pending';
    }elseif($row['status']==2){
        $status='Done';
    }else{
        $status='Challan';
    }
    $pdf->Cell(30, 8, $row['date'], 1);
    $pdf->Cell(50, 8, $row['vahicleNumber'], 1);
    $pdf->Cell(50, 8, $row['customerName'], 1);
    $pdf->Cell(50, 8, $status, 1); // You may want to convert status to a readable format
    // $pdf->Cell(30, 10, 'Doc', 1); // Placeholder for document link
    $pdf->Ln();
}

// Output the PDF to the browser
$pdf->Output('I', "vehicle_data_report $pdfDate.pdf"); // D for download
// $pdf->Output();
?>