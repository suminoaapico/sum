<?php
  require('fpdf/fpdf.php');
class PDF extends FPDF
{
//Simple table
function BasicTable($header,$data)
{
//Header
  foreach($header as $col)
 $this->Cell(40,7,$col,1);
 $this->Ln();
 //Data
 foreach($data as $row)
 {
 foreach($row as $col)
 $this->Cell(40,6,$col,1);
 $this->Ln();
}
}
}//end class

//header declare
 $header=array('name','surname');

data query from database keep to array 2 dimension
$sql = ...;
$query = ...;
$i=0;
while($arr) {
  $data[$i][0] = $arr['name'];
 $data[$i][1] = $arr['surname'];
$i++;
}

//create object pdf
$pdf = new PDF();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();

?>