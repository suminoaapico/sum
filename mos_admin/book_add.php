<html><!-- InstanceBegin template="/Templates/admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Admin</title>
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
	  <h3>Book Add</h3>
	  <div class="shortcutHome"></div>
     	<div class="informasi">เพิ่มหนังสือ</div>
<?php include('../config.inc'); 
		if (isset($_POST["send"]))
 			 process_form();
		else
 			 show_form();
  
#################################################################
#  ฟังก์ชั่นที่ใช้แสดงฟอร์ม
#################################################################
	function show_form() {
	 include('../config.inc'); 
        ?><?php echo"<form method=\"POST\" action=\"{$_SERVER['PHP_SELF']}\" enctype=\"multipart/form-data\"> ";?>
        <table class="data">
              <tr class="data">
				<th class="data" width="71">รหัส</th>
				<td width="611" class="data"><?php echo "<input name=\"ID_Book\" type = \"text\" >" ?> </td>
			</tr>
			<tr class="data">
				<th class="data" width="71">ชื่อหนังสือ</th>
				<td class="data"><?php echo "<input name=\"Na_Book\" type = \"text\"  size=\"60\" width=\"60\" >" ?></td>
			</tr>
             <tr class="data">
				<th class="data" width="71">รายละเอียด</th>
				<td class="data"><?php echo "<textarea name=\"De_Book\"  ></textarea>" ?></td>
			</tr>
            
            <tr class="data">
				<th class="data" width="71">ราคา</th>
				<td class="data"><?php echo "<input name=\"Va_Book\" type = \"text\">" ?></td>
			</tr>
            <tr class="data">
				<th class="data" width="71">หมวดหมู่</th>
				<td class="data"><?php $result1 = mysqli_query($con, "SELECT * FROM bso_book_category LIMIT 1, 30");
							echo "หมวดหมู่ <select  name=\"ID_Ca\"/>";
							while ($row1 = mysqli_fetch_array($result1)) {
							echo "<option value=\"{$row1['ID_Ca']}\">{$row1['Na_Ca']}</option>";
										}
							echo"</select>"."<br>"; 
 echo"รูปภาพ<input type=\"file\" name=\"fileUpload\" id=\"file\"/>"."<br/>"; 
echo "<input type=\"submit\" name=\"send\" value=\"	บันทึกข้อมูล\"> " ;

}

?></form></td>
			</tr>
		</table>
	  <div class="clear"></div>
	</div>
    
 <?php
#################################################################
    //ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
#################################################################
function process_form() {
echo"<div id=\"smallRight\">";
 include('../config.inc');
 $ID_Book = trim($_POST["ID_Book"]);
  $Na_Book = trim($_POST["Na_Book"]);
  $De_Book = trim($_POST["De_Book"]);
  $Va_Book = trim($_POST["Va_Book"]);
  $ID_Ca   = trim($_POST["ID_Ca"]);
  if (($ID_Book == "") or ($Na_Book == "") or ($Va_Book == "")) {
    echo "<font color=\"red\">เกิดข้อผิดพลาด: คุณป้อนข้อมูลไม่ครบ</font><br>";
    exit;
  }
  echo "<br>"."ชื่อไฟล์ = ".$_FILES["fileUpload"]["name"]."<br>";
echo "สกุลไฟล์ = ".$_FILES["fileUpload"]["type"]."<br>"; 
echo "ขนาด = ".$_FILES["fileUpload"]["size"]." bytes<br>"; 
echo "ความผิดพลาด(ไฟล์เสียหาย) = ".$_FILES["fileUpload"]["error"]."<br>"; 

if(copy($_FILES["fileUpload"]["tmp_name"],"images/".$_FILES["fileUpload"]["name"]))  //รูปภาพ
{
	echo "<p>อับโหลดสำเร็จ<br><p/>";
	echo "<p>สามารถตลวจสอบได้ที่<br>";
	echo "";
	echo "<a href=\"images/".$_FILES["fileUpload"]["name"]."\">images/".$_FILES["fileUpload"]["name"]."</a>";
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
  $sql = "INSERT INTO bso_book (`ID_Book`, `Na_Book`,De_Book, `Va_Book`, ID_Ca,images,time) 
  VALUES ('{$ID_Book}', '{$Na_Book}','{$De_Book}', '{$Va_Book}','{$ID_Ca}','{$Im}', NOW());";	
  $result = mysqli_query($con, $sql);

  echo "<h3>ผลการเพิ่มข้อมูลหนังสือ</h3>\n";
  if ($result) {
    echo "เพิ่มข้อมูลหนังสือเข้าสู่ฐานข้อมูลจำนวน " . mysqli_affected_rows($con) . " รายการ<br>";
    echo "<a href=\"book_add.php\">เพิ่มรายการ</a><br>";
  }
  else {
    echo"	<div class=\"gagal\">เกิดข้อผิดพลาด!!!</div>";
  }
  echo"</div>";
  }
  mysqli_close($con);  
  ?>
	<!-- InstanceEndEditable -->
	<div class="clear"></div>
<div id="footer">
	&copy; 2012 Admin Bookshoponline  By Programmer INDY<a href="../index.php" target="_blank">กลับไปหน้าเว็บ</a>
</div>
</div>
</body>
<!-- InstanceEnd --></html>