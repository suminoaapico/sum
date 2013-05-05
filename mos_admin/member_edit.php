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
	  <h3>Member edit</h3>
	  <div class="shortcutHome"></div>
     	<div class="informasi">
		แก้ไขรายละเอียดสมาชิก
      
        </div>
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
    $ID = $_GET["ID_Member"];
$result = mysqli_query($con, "SELECT * FROM bso_member WHERE ID_Member = '{$ID}' " );
$row = mysqli_fetch_array($result);
        ?><?php echo"<form method=\"POST\" action=\"{$_SERVER['PHP_SELF']}\">";  
		echo"<input  hidden=\"\" name=\"ID_Member\" value='{$ID}'>" ;?>
        <table class="data">
        <tr><td colspan="2" align="center"><?php //echo "<img height= 400 width=300 src=\"images/{$row['images']}\" />" ?></td>
        </tr>
			<tr class="data">
				<th class="data" width="71">รหัส</th>
				<td width="611" class="data"><?php echo"{$row['ID_Member']}";?> </td>
			</tr>
			<tr class="data">
				<th class="data" width="71">User</th>
				<td class="data"><?php echo "{$row['Us_Member']}"; ?></td>
			</tr>
              <tr class="data">
				<th class="data" width="71">ชื่อ</th>
				<td class="data"><?php echo "<input name=\"Na_Member\" type = \"text\" value = {$row['Na_Member']}>" ?></td>
			</tr>
            <tr class="data">
				<th class="data" width="71">ที่อยู่</th>
				<td class="data"><?php echo "<input size=\"80\" name=\"Ad_Member\" type = \"text\" value = {$row['Ad_Member']}>" ?></td>
			</tr>
            <tr class="data">
				<th class="data" width="71">เบอร์โทร</th>
				<td class="data"><?php echo "<input name=\"Te_Member\" type = \"text\" value = {$row['Te_Member']}>"?></td>
			</tr>
                <tr class="data">
				<th class="data" width="71">อีเมล์</th>
				<td class="data"><?php echo "<input name=\"Em_Member\" type = \"text\" value = {$row['Em_Member']}>" ?></td>
			</tr>
		</table>
		<?php
		echo "<input type=\"submit\" name=\"send\" value=\"	บันทึกข้อมูล\"> " ;
		 }?></form>
	  <div class="clear"></div>
	</div>
    <?php
#################################################################
    //ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
#################################################################
function process_form() {
 include('../config.inc');
 $ID = $_POST['ID_Member'] ;
$Us_Member = $_POST['Us_Member'] ;
$na_member = $_POST['Na_Member'] ;
$ad_member = $_POST['Ad_Member'] ;
$te_member = $_POST['Te_Member'] ;
$em_member = $_POST['Em_Member'] ;
?>
<?php  
$sql = "UPDATE bso_member SET   Na_Member ='{$na_member}'  , Ad_Member ='{$ad_member}', Te_Member ='{$te_member}', Em_Member = '{$em_member}' WHERE Us_Member = '{$Us_Member}' ";	
$result = mysqli_query($con, $sql);

  echo "<h3>ผลการแก้ไขโปรโฟล์</h3>\n";
  if ($result) {
   	echo"	<div class=\"sukses\">แก้ไขข้อมูลสำเร็จ</div>";;
    echo "<a href=\"member_detail.php?ID_Member={$ID}\">ดูโปรไฟล์</a><br>";
  }
  else {
   echo"	<div class=\"gagal\">เกิดข้อผิดพลาด</div>";
  }

  mysqli_close($con);
}
?>
	<!-- InstanceEndEditable -->
	<div class="clear"></div>
<div id="footer">
	&copy; 2012 Admin Bookshoponline  By Programmer INDY<a href="../index.php" target="_blank">กลับไปหน้าเว็บ</a>
</div>
</div>
</body>
<!-- InstanceEnd --></html>