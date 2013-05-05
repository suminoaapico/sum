 <?php
$db_ad ="localhost";
$db_user ="root";
$db_pass="";
$db_name="bookonline";
$con = @mysqli_connect($db_ad,$db_user,$db_pass)or die ("Can not connect MySQL");
mysqli_select_db($con,$db_name)or die ("Can not connect database");

    require_once('tcpdf/config/lang/eng.php');
    require_once('tcpdf/tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


$query=mysqli_query($con,"select * from bso_order");
$query=mysqli_fetch_assoc($query);

$tbl_header = '<table style="width: 638px;" cellspacing="0">';
$tbl_footer = '</table>';
$tbl = '';

foreach($query as $query2){
$ciid = $query2['ID_Order'];
$cinature = $query2['ID_Book'];
$ciposition = $query2['Number'];
$tbl .= '
    <tr>
        <td style="border: 1px solid #000000; width: 150px;">'.$ciid.'</td>
        <td style="border: 1px solid #000000; width: 378px;">'.$cinature.'</td>
        <td style="border: 1px solid #000000; width: 110px; text-align:center">'.$ciposition.'</td>
    </tr>
';}

$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');


$pdf->Output('test.pdf');

?>