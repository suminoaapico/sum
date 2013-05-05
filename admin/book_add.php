<html>
<head>
<title>Top Upload</title>
</head>
<body>



<?php  


  $ID_Book = trim($_POST["ID_Book"]);
  $Na_Book = trim($_POST["Na_Book"]);
  $De_Book = trim($_POST["De_Book"]);
  $Va_Book = trim($_POST["Va_Book"]);
  $ID_Ca   = trim($_POST["ID_Ca"]);
  if (($ID_Book == "") or ($Na_Book == "") or ($Va_Book == "")) {
    echo "<font color=\"red\">เกิดข้อผิดพลาด: คุณป้อนข้อมูลไม่ครบ</font><br>";
    exit;
  }
  echo "ชื่อไฟล์ = ".$_FILES["fileUpload"]["name"]."<br>";
echo "สกุลไฟล์ = ".$_FILES["fileUpload"]["type"]."<br>"; 
echo "ขนาด = ".$_FILES["fileUpload"]["size"]." bytes<br>"; 
echo "ความผิดพลาด(ไฟล์เสียหาย) = ".$_FILES["fileUpload"]["error"]."<br>"; 

if(copy($_FILES["fileUpload"]["tmp_name"],"images/".$_FILES["fileUpload"]["name"]))  //รูปภาพ
{
	echo "<p>อับโหลดสำเร็จ<br><p/>";
	echo "<p>สามารถตลวจสอบได้ที่<br>";
	echo "<HR color=#FFFFFF>images/".$_FILES["fileUpload"]["name"]."<HR color=#FFFFFF><br><p/>";
	echo "<HR color=#FFFFFF>tpsumeta@gmail.com<HR color=#FFFFFF><br>";
}else{
     echo "<p>อับโหลดไม่สำเร็จ ไม่สามารถอับโหลดได้<br>";
     }
       
   
  $ID_Book = addslashes($ID_Book);
  $Na_Book = addslashes($Na_Book);
  $De_Book = addslashes($De_Book);
  $Va_Book = doubleval($Va_Book);
  $ID_Ca =   doubleval($ID_Ca);
   $Im=$_FILES["fileUpload"]["name"];
   echo $Im;
  include('../config.inc');
  $sql = "INSERT INTO bso_book (`ID_Book`, `Na_Book`,De_Book, `Va_Book`, ID_Ca,images) 
  VALUES ('{$ID_Book}', '{$Na_Book}','{$De_Book}', '{$Va_Book}','{$ID_Ca}','{$Im}');";	
  $result = mysqli_query($con, $sql);

  echo "<h3>ผลการเพิ่มข้อมูลหนังสือ</h3>\n";
  if ($result) {
    echo "เพิ่มข้อมูลหนังสือเข้าสู่ฐานข้อมูลจำนวน " . mysqli_affected_rows($con) . " รายการ<br>";
    echo "<a href=\"book_add_form.php\">เพิ่มรายการ</a><br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล<br>";
  }

  mysqli_close($con);  
  

?>
</body>

</html>