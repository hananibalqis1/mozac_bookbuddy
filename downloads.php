<?php

require('fpdf/fpdf.php');
include('connect.php');

$isbn = $_GET['isbn'];

$sql = "SELECT * FROM report INNER JOIN member ON report.id = member.id WHERE isbn='" . $isbn . "'";

class PDF extends FPDF {

	// Page header
	function Header() {
		
		// Add logo to page
		$this->Image('images/logo.png',90,8,21);
        
		
		// Set font family to Arial bold
		$this->SetFont('Arial','B',14);
		
		// Move to the right
		$this->Ln(25);
		$this->Cell(65);
		
		// Header
		// $this->Cell(90,10,'MOZAC BookBuddy Library Management System',0,0,'C');
		$this->Cell(55,10,'MOZAC BookBuddy',0,0);
		$this->Ln();
		$this->Cell(56);
		$this->Cell(85,10,'Library Management System',0,0);
		
		// Line break
		$this->Ln(5);
	}

	// Page footer
	function Footer() {
		
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		
		// Arial italic 8
		$this->SetFont('Arial','I',10);
		
		// Page number
		$this->Cell(0,10,'Page ' .
			$this->PageNo() . '/{nb}',0,0,'C');
	}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$pdf->Ln(10);

$pdf->Cell(25,5,'ISBN No:',0,0);
$pdf->Cell(165,5,$isbn,0,0);
$pdf->Ln(10);
$pdf->Cell(0,10,'Book Issued History',1,1,'C');

$pdf->Cell(25,5,'ID',1,0);
$pdf->Cell(55,5,'Borrower Name',1,0);
$pdf->Cell(55,5,'Date Issued',1,0);
$pdf->Cell(55,5,'Date Returned',1,1);

$result=$conn->query($sql);

if($result !== false && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pdf->Cell(25,10,$row['id'],1,0);
        $pdf->Cell(55,10,$row['name'],1,0);
        $pdf->Cell(55,10,$row['borrow_date'],1,0);
        $pdf->Cell(55,10,$row['return_date'],1,0);
        $pdf->Ln();
    }
}

$file = time() . '.pdf';
$pdf->Output($file,'D');
// $pdf->Output();

?>