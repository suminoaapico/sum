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
	  <h3>ลบแจ้งการจ่ายเงิน</h3>
	  <div class="clear"></div>
	  <div id="smallRight">
	    
        <?php include('../config.inc'); 
$ID_Order = $_GET["ID_Order"];
$sql = "DELETE FROM bso_order WHERE ID_Order='{$ID_Order}'";
$result = mysqli_query($con, $sql);
  echo "<h3>ผลการลบ</h3>\n";
  if ($result) {
    echo "ลบสำเร็จ " ."<br>";
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=order_manager.php\">";
  }
  else {
    echo "เกิดข้อผิดพลาด ไม่สามารถลบได้<br>";
  }
  mysqli_close($con);
  echo '<a href="order_manager.php">กลับ</a>';
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