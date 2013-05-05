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
	  <h3>Order Manager</h3>
	  <div class="quoteOfDay"> <b>ระบบจัดการ รายการสั่งซื้อ:</b><br>
	  <?php include('../config.inc');
$status = $_POST['status'] ;
$ID_Order = $_POST['ID_Order'] ;
?>
<?php 
$sql = ("UPDATE bso_order SET Status_o ='{$status}' 
WHERE ID_Order = '{$ID_Order}' ");	
$result = mysqli_query($con, $sql);


  echo "<h3>ผลการแก้ไข</h3>\n";
  if ($result) {
    echo"	<div class=\"sukses\">แก้ไขข้อมูลสำเร็จ</div>";
    echo "<a href=\"order_detail.php?ID_Order={$ID_Order}\">รายการส่งซื้อ</a><br>";
  }
  else {
     echo"	<div class=\"gagal\">เกิดข้อผิดพลาด</div>";
  }

  mysqli_close($con);
  
?>
      
      </div>
	  <div class="clear"></div>
	</div>
	<!-- InstanceEndEditable -->
	<div class="clear"></div>
<div id="footer">
	&copy; 2012 Admin Bookshoponline  By Programmer INDY<a href="../index.php" target="_blank">กลับไปหน้าเว็บ</a>
</div>
</div>
</body>
<!-- InstanceEnd --></html>