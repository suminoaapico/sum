<?php  include('../config.inc');

if (isset($_POST["send"]))
  process_form();
else
  show_form();

//ฟังก์ชั่นที่ใช้แสดงฟอร์ม
function show_form() {
echo"<form method=\"POST\" action=\"{$_SERVER['PHP_SELF']}\" enctype=\"multipart/form-data\">";
$ID_Book=$_GET['ID_Book'];
  echo <<<HTMLBLOCK
<h3>เพิ่มรายชื่อหนังสือ</h3>
รูปภาพ<input type="file" name="file" id="file"/><br/>
รหัสหนังสือ $ID_Book<input name="ID_Book" type = "hidden" value ="$ID_Book" ><br/>
<input type="submit" name="send" value="อัฟรูป">
HTMLBLOCK;
 
 echo"</form>";
}

function process_form() {
echo"<h3>รูปภาพ</h3>";
$ID_Book=$_POST['ID_Book'];
$F = $_FILES["file"]["name"];
echo "ชื่อไฟล์ = ".$_FILES["file"]["name"]."<br>";
echo "สกุลไฟล์ = ".$_FILES["file"]["type"]."<br>"; 
echo "ขนาด = ".$_FILES["file"]["size"]." bytes<br>"; 
echo "ความผิดพลาด(ไฟล์เสียหาย) = ".$_FILES["file"]["error"]."<br>"; 

if(copy($_FILES["file"]["tmp_name"],"images/".$_FILES["file"]["name"]))  //รูปภาพ
{
	echo "<p>อับโหลดสำเร็จ<br><p/>";
	echo "<p>สามารถตลวจสอบได้ที่<br>";
	echo "<HR color=#FFFFFF>images/".$_FILES["file"]["name"]."<p/>";
	echo "<HR color=#FFFFFF>tpsumeta@gmail.com<HR color=#FFFFFF><br>";
}else{
     echo "<p>อับโหลดไม่สำเร็จ ไม่สามารถอับโหลดได้<br>";
     }
	 
	 include('../config.inc');

  $sql = "UPDATE bso_book SET   images ='{$F}'  WHERE ID_Book = '{$ID_Book}' ";	
  $result = mysqli_query($con, $sql);
  

// แสดงผลการเพิ่มข้อมูล
  echo "<h3>ผลการเพิ่ม</h3>\n";
  if ($result) {
    echo "เพิ่มสมาชิกฐานข้อมูลจำนวน " . mysqli_affected_rows($con) . " รายการ<br>";

  }
  else {
    echo "เกิดข้อผิดพลาดในการเพิ่รหัสสมาชิกหรื่อชื่อสมาชิกอาจมีอยู่แล้ว<br>";
  }
	 
  mysqli_close($con);
}

?>
