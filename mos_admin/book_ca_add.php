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
	  <h3>Book catagory add</h3>
	  <div class="shortcutHome"></div>
     	<div class="informasi">เพิ่มหมวดหมู่</div>
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
				<td width="611" class="data"><?php echo "<input name=\"ID_Ca\" type = \"text\" >" ?> </td>
			</tr>
			<tr class="data">
				<th class="data" width="71">ชื่อหมวดหมู่</th>
				<td class="data"><?php echo "<input name=\"Na_Ca\" type = \"text\"  size=\"60\" width=\"60\" >" ?></td>
			</tr>
      
            <tr class="data">
				
				<td class="data"><?php 
				
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
 $ID_Ca = trim($_POST["ID_Ca"]);
  $Na_Ca = trim($_POST["Na_Ca"]);


  include('../config.inc');
  $sql = "INSERT INTO bso_book_category (`ID_Ca`, `Na_Ca`) VALUES ('{$ID_Ca}', '{$Na_Ca}')";	
  $result = mysqli_query($con, $sql);

  echo "<h3>ผลการเพิ่มข้อมูล</h3>\n";
  if ($result) {
    echo "เพิ่มข้อมูลหนังสือเข้าสู่ฐานข้อมูลจำนวน " . mysqli_affected_rows($con) . " รายการ<br>";
    echo "<a href=\"book_ca_mannager.php\">หมวดหมู่</a><br>";
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