<?php include('admin_only.php');?>
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
	  <h3>Member Add</h3>
	  <div class="shortcutHome"></div>
     	<div class="informasi">เพิ่มสมาชิก</div>
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
       <br> <table class="data">
              <tr class="data">
				<th class="data" width="71">รหัส</th>
				<td width="611" class="data"><?php echo "<input name=\"ID_Member\" type = \"text\" >" ?> </td>
			</tr>
			<tr class="data">
				<th class="data" width="71">User</th>
				<td class="data"><?php echo "<input name=\"Us_Member\" type = \"text\"  size=\"60\" width=\"60\" >" ?></td>
			</tr>
             <tr class="data">
				<th class="data" width="71">pass</th>
				<td class="data"><?php echo "<input name=\"Pa_Member\" type=\"text\"  >" ?></td>
			</tr>
            
            <tr class="data">
				<th class="data" width="71">ชื่อ</th>
				<td class="data"><?php echo "<input name=\"Na_Member\" type = \"text\">" ?></td>
			</tr>
            
            <tr class="data">
				<th class="data" width="71">ที่อยู่</th>
			     <td><?php echo "<textarea  name=\"Ad_Member\" type = \"text\" ></textarea>" ?> </td>
             </tr>
             
			 <tr class="data">
				<th class="data" width="71">เบอร์โทร</th>
			     <td><?php echo "<input name=\"Te_Member\" type = \"text\">" ?></td>
             </tr>		
             	
        <tr class="data">
				<th class="data" width="71">อีเมล์</th>
			     <td><?php echo "<input name=\"email\" type = \"text\">" ?></td>
             </tr>
             </table>
<?php
echo "<input type=\"submit\" name=\"send\" value=\"	บันทึกข้อมูล\"> " ;

}

?></form>
		
		
	  <div class="clear"></div>
	</div>
    
 <?php
#################################################################
    //ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
#################################################################
function process_form() {
echo"<div id=\"smallRight\">";
  $ID_Member = trim($_POST["ID_Member"]);
  $Us_Member = trim($_POST["Us_Member"]); 
  $Pa_Member = trim($_POST["Pa_Member"]);
  $Na_Member = trim($_POST["Na_Member"]); 
  $Ad_Member = trim($_POST["Ad_Member"]);
  $Te_Member = trim($_POST["Te_Member"]);
  $email 	 = trim($_POST["email"]); 
  
  if (($ID_Member == "") or ($Na_Member == "") or ($Us_Member == "") or ($Pa_Member == "")) {
    echo "<font color=\"red\">เกิดข้อผิดพลาด: คุณป้อนข้อมูลไม่ครบ</font><br>";
    show_form();
    exit;
  }

  $ID_Member = addslashes($ID_Member);
  $Na_Member = addslashes($Na_Member);
  $Us_Member = addslashes($Us_Member);
  $Pa_Member = addslashes($Pa_Member);
  $Ad_Member = addslashes($Ad_Member);
  $Te_Member = addslashes($Te_Member);
  $email = addslashes($email);
  include('../config.inc');
  $sql = "INSERT INTO `bso_member`(`ID_Member`, `Na_Member`, `Ad_Member`, `Te_Member`, `Em_Member`, `Us_Member`, `Pa_Member`) VALUES ('{$ID_Member}','{$Na_Member}','{$Ad_Member}','{$Te_Member}','{$email}','{$Us_Member}','{$Pa_Member}')";	
  mysql_query("set name tis620");
  $result = mysqli_query($con, $sql);
  
      echo "<h3>ผลการสมัครสมาชิก</h3>\n";
  if ($result) {
    echo "เพิ่มสมาชิกฐานข้อมูลจำนวน " . mysqli_affected_rows($con) . " รายการ<br>";
   echo "<a href=\"member_manager.php\">แสดงรายการชื่อสมาชิกทั้งหมด</a><br>";
  }
  else {
   echo "เกิดข้อผิดพลาดในการเพิ่รหัสสมาชิกหรื่อชื่อสมาชิกอาจมีอยู่แล้ว<br>";
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