<html><!-- InstanceBegin template="/Templates/admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administator Bookshoponline</title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="mos-css/mos-style.css"> <!--pemanggilan file css-->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div id="header">
	<div class="inHeader">
		<div class="mosAdmin">
		Hello, Administrator<br>
		<a href="../logout.php">ออกจากระบบ</a></div>
	<div class="clear"></div>
	</div>
</div>

<div id="wrapper">
	<div id="leftBar">
	<ul>
		<li><a href="index.php">หน้าแรก</a></li>
		<li><a href="book_mannager.php">หนังสือ</a></li>
	  <li><a href="member_manager.php">สมาชิก</a></li>
        <li><a href="order_manager.php">การสั่งซื้อ</a></li>
	</ul>
	</div>
	<!-- InstanceBeginEditable name="1" -->
	<div id="rightContent">
	  <h3>แก้ไขรูปภาพ</h3>
	  <div class="clear"></div>
	  <div id="smallRight">
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
	  </div>
    </div>
	<!-- InstanceEndEditable -->
	<div class="clear"></div>
<div id="footer">
	&copy; 2012 Admin Bookshoponline  By Programmer INDY<a href="../index.php" target="_blank">กลับไปหน้าเว็บ</a>
</div>
</div>
</body>
<!-- InstanceEnd --></html>