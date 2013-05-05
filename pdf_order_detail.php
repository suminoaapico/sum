<?php   session_start();


define('FPDF_FONTPATH','fonts/');

$db_ad ="localhost";
$db_user ="root";
$db_pass="";
$db_name="bookonline";
$con = @mysqli_connect($db_ad,$db_user,$db_pass)or die ("Can not connect MySQL");
mysqli_select_db($con,$db_name)or die ("Can not connect database");
require('fpdf/fpdf.php');

$user = $_SESSION["valid_user"];
$ID_Order = $_GET["ID_Order"];
$result = mysqli_query($con, "SELECT *
     FROM bso_member, bso_order, bso_book
     WHERE bso_member.ID_Member = bso_order.ID_Member AND bso_book.ID_Book = bso_order.ID_Book  AND bso_member.Us_Member =  '{$user}' AND ID_order='{$ID_Order}' " );

$result1 = mysqli_query($con, "SELECT *
     FROM bso_member, bso_order, bso_book
     WHERE bso_member.ID_Member = bso_order.ID_Member AND bso_book.ID_Book = bso_order.ID_Book  AND bso_member.Us_Member =  '{$user}' AND ID_order='{$ID_Order}' " );
$row1 = mysqli_fetch_array($result1);
	 
 $row = mysqli_fetch_array($result);
  // เชื่อต่อกับฐานข้อมูล
 
 class PDF2 extends FPDF{
   function BasicTable($header){ 
//ส่วน colums
   foreach($header as $col)
       $this->Cell(30,7,$col,1); //กำหนดความกว้างของ colums
   $this->Ln(); 
    }
 }
$pdf=new PDF2();
$header=array('Colum 1','Colum 2','Column 3','Column 4','Column 5'); // เพิ่ม colums

$pdf->AddPage();
$pdf->BasicTable($header);

$pdf=new FPDF();

 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');  // เพิ่ม font

//สร้างหน้าเอกสาร
$pdf->AddPage();


 
// กำหนดฟอนต์ที่จะใช้  อังสนา ตัวธรรมดา ขนาด 12
$pdf->SetFont('angsana','B',32);
// พิมพ์ข้อความลงเอกสาร
$pdf->setXY( 80, 30  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'BookShopOnline' ) );
 
 $pdf->SetFont('angsana','',20);
$pdf->setXY( 80, 40);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' ,"ใบชำระสินค้า/ใบเสร็จรับเงิน" )  );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 50  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' ,"รหัสสมาชิก : {$row1['ID_Member']}   โทร : {$row1['Te_Member']}"  )  );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 150, 45);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' ,"เลขที่ : {$row1['ID_Order']}" )  );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 120, 55  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' ,"วันที่สั่งรายการ {$row['Da_Order']} ")  );

$date = date("H:i:s d/m/Y");
$pdf->SetFont('angsana','',16);
$pdf->setXY( 120, 65  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' ,"วันที่พิมพ์รายการ {$date}")  );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 60  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' ,"User : {$row1['Us_Member']}             อีเมล์ : {$row1['Em_Member']}"  )  );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 70  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' ,'สถานะ:  ชำระเงินแล้ว')   );
 
 

 
$pdf->Output();

?>