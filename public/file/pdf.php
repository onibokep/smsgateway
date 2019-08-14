<?php
use Codedge\Fpdf\Fpdf\FPDF;
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Courier', 'B', 18);
$pdf->Cell(50, 25, 'Hello World!');
$pdf->Output();
?>