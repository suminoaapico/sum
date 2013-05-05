<html>
<head>
<title>ThaiCreate.Com PHP PDF</title>
</head>
<body>

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

}

$pdf=new PDF();
//Column titles
$header=array('Column 1','Column 2','Column 3','Column 4');

$pdf->SetFont('Arial','',10);

$pdf->AddPage();
$pdf->BasicTable($header,$data);



$pdf->Output();
?>

PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>
</html>