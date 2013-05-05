<?php
define('FPDF_FONTPATH','font/');
require('fpdf17/fpdf.php');

 class  SimpleTable extends FPDF
{
function Header()
{
$this->SetFont('times','',16);
$this->Cell(0,10,'Header',1,0,'C');
$this->Ln(20);
}
function Footer()
{
$this->SetFont('times','',16);
$this->SetY(-190);
$this->Cell(0,10,'Footer',1,0,'C');
$this->Ln(20);
}
function generateTable($no)
{
for($i=1;$i<=10;$i++)
{
$this->cell(10,5,$no,1,0,"C");
$this->cell(10,5," * ".$i,1,0,"C");
$this->cell(10,5," = ".$i*$no,1,1,"C"); 
}
}
}
 
$pdf=new SimpleTable();
$pdf->AddPage();


$pdf->SetFont('times','',10);
$pdf->Cell(0,10,'Generate Table');
$pdf->Ln();
$pdf->generateTable(5);

$pdf->Output();
?>