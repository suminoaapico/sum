
<?php
  require_once('fpdf/fpdf.php');
  class PDF extends FPDF{
  function BasicTable($header){ 
//ส่วน colums
   foreach($header as $col)
       $this->Cell(30,7,$col,1); //กำหนดความกว้างของ colums
   $this->Ln(); 
   }
}
$pdf=new PDF();
$header=array('Colum 1','Colum 2','Column 3','Column 4','Column 5'); // เพิ่ม colums

$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->BasicTable($header);
$pdf->BasicTable($header);
$pdf->Output();
// $pdf->Output("MyPDF/MyPDF.pdf","F");
?>
