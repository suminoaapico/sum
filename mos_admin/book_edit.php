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
	  <h3>Book edit</h3>
	  <div class="shortcutHome"></div>
     	<div class="informasi">แก้ไขรายละเอียดหนังสือ</div>
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
    $ID = $_GET["ID_Book"];
$result = mysqli_query($con, "SELECT * FROM bso_book, bso_book_category WHERE bso_book.ID_Book = '{$ID}' AND bso_book.ID_Ca=bso_book_category.ID_Ca " );
$row = mysqli_fetch_array($result);
        ?><?php echo"<form method=\"POST\" action=\"{$_SERVER['PHP_SELF']}\">";?>
        <table class="data">
        <tr><td colspan="2" align="center"><?php echo "<img height= 400 width=300 src=\"images/{$row['images']}\" />" ?></td>
        </tr>
			<tr class="data">
				<th class="data" width="71">รหัส</th>
				<td width="611" class="data"><?php echo "<input name=\"ID_Book\" type = \"text\" value = {$row['ID_Book']}>" ?> </td>
			</tr>
			<tr class="data">
				<th class="data" width="71">ชื่อหนังสือ</th>
				<td class="data"><?php echo "<input name=\"Na_Book\" type = \"text\"  size=\"60\" width=\"60\" value = {$row['Na_Book']}>" ?></td>
			</tr>
             <tr class="data">
				<th class="data" width="71">รายละเอียด</th>
				<td class="data"><?php echo "<textarea name=\"De_Book\"  >{$row['De_Book']}</textarea>" ?></td>
			</tr>
            
            <tr class="data">
				<th class="data" width="71">ราคา</th>
				<td class="data"><?php echo "<input name=\"Va_Book\" type = \"text\" value = {$row['Va_Book']}>" ?></td>
			</tr>
            
             <tr class="data">
				<th class="data" width="71">สถานะ</th>
				<td class="data"><?php 
			//echo "หมวดหมู่ <select  name=\"Status\">";
				//echo "<option value=\"t\">มีหนังสือ</option>";   
				//echo "<option value=\"f\">ไม่มีหนังสือ</option>";    
				//echo"</select>";?>
				     <label><input type="radio" name="Status" value="t" id="RadioGroup1_0" checked="yes" >มีหนังสือ</label>
				     <label><input type="radio" name="Status" value="f" id="RadioGroup1_1">ไม่มีหนงสือ</label>
				     	        
		</td>
            
			</tr>
            
            <tr class="data">
				<th class="data" width="71">หมวดหมู่</th>
				<td class="data"><?php $result1 = mysqli_query($con, "SELECT * FROM bso_book_category LIMIT 1, 30");
							echo "หมวดหมู่ <select  name=\"ID_Ca\"/>";
							while ($row1 = mysqli_fetch_array($result1)) {
							echo "<option value=\"{$row1['ID_Ca']}\">{$row1['Na_Ca']}</option>";
										}
							echo"</select>";
		 
echo "<input type=\"submit\" name=\"send\" value=\"	บันทึกข้อมูล\"> " ;
echo" <a href=\"book_edit_pic.php?ID_Book=$ID\">แก้ไขรูป</a>";
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
 include('../config.inc');
$ID_Book = $_POST['ID_Book'] ;
$Na_Book = $_POST['Na_Book'] ;
$De_Book = $_POST['De_Book'] ;
$Va_Book = $_POST['Va_Book'];
$ID_Ca = $_POST['ID_Ca'];
if($_POST['Status']!=null){
$Status = $_POST['Status'];
}else{
$Status ="t";
}
?>
<?php 
$sql = "UPDATE bso_book SET  
ID_Book='{$ID_Book}'  , Na_Book ='{$Na_Book}',De_Book ='{$De_Book}',Va_Book ='{$Va_Book}',ID_Ca ='{$ID_Ca}',Status ='{$Status}'
WHERE ID_Book = '{$ID_Book}' ";	
$result = mysqli_query($con, $sql);

  echo "<h3>ผลการแก้ไข</h3>\n";
  if ($result) {
	echo"	<div class=\"sukses\">แก้ไขข้อมูลสำเร็จ</div>";
	echo "<a href=\"book_detail.php?ID_Book=$ID_Book\">ดูหนังสือ</a><br>";
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