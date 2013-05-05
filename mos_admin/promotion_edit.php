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
	  <h3>Book Search</h3>
	  <div class="clear"></div>
	  <div id="smallRight">
	    <h3>ค้นหาหนังสือ</h3>
        
<table align="center" border="0" width="100%">
<tr><td align="center">
<?php
$detail=$_POST['detail'];
if (isset($detail)) {
$f=fopen("../promotion.inc", "wb");
flock($f, 2);
fwrite($f, $detail);
flock($f, 3);
fclose($f);
echo "แก้ไขข้อความเรียบร้อย";
}
?>
</td></tr>
<tr><td align="center">
<table align="center" border="0">
<form method="post" action="promotion_edit.php">
<tr><td align="center">
<textarea rows="25" cols="100" name="detail" class="black"><?php include("../promotion.inc") ?></textarea>
</td></tr>
<tr><td align="right">
<input type=submit value='แก้ไข' name="submit" class=black>  <input type=reset value='เคลียร์' name="reset" class=black>
</td></tr>
</form>
</table>
</td></tr>
</table>

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