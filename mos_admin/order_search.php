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
	  <h3>Order Search</h3>
	  <div class="clear"></div>
	  <div id="smallRight">
	    <h3>ค้นหารายการสั่งซื้อ</h3>
        
<?php include('../config.inc');
if (isset($_POST["send"]))
  process_form();
else
  show_form();
//ฟังก์ชั่นที่ใช้แสดงฟอร์ม
function show_form() {
  echo <<<HTMLBLOCK
<h3>ค้นหา</h3>
<form method="POST" action="{$_SERVER['PHP_SELF']}">
  ค้นหาจาก: 
  <select name="searchtype">
    <option value="ID_Order" selected>รหัสสั่งสินค้า</option>
    <option value="ID_Member">รหัสสมาชิก</option>
  </select><br>
  ป้อนคำค้น: <input type="text" name="searchterm" size="30"><br>
  <input type="submit" name="send" value="ค้นหา">
  </form>
HTMLBLOCK;
}

//ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
function process_form() {
  $search_term = trim($_POST["searchterm"]);
  if ($search_term == "") {
    echo "<font color=\"red\">เกิดข้อผิดพลาด: คุณไม่ได้ป้อนคำค้น</font><br>";
    show_form();
    exit;
  }

  $search_term = addslashes($search_term);
  $search_field = $_POST["searchtype"];

  include('../config.inc');
  $sql = "SELECT * FROM bso_order WHERE {$search_field} LIKE '%{$search_term}%';"; // เงื่อนไขการค้นหาจากฐานข้อมูล
  $result = mysqli_query($con, $sql);  // ส่งคำสั่ง SQL ไปประมวลผลยังฐานข้อมูล
  echo "<h3>ผลการค้นหาหนังสือ</h3>\n";
  echo "จำนวนที่พบ: " . mysqli_num_rows($result) . " รายการ<br><br>\n";  // นับจำนวนแถวที่ส่งมาจาก $result
  $i = 1;
  while ($row = mysqli_fetch_array($result)) {
    echo "<b>{$i}. รหัสสมาชิก: {$row['ID_Member']}</b><br>\n";
    echo "รหัส order: <a href=\"order_detail.php?ID_Order={$row['ID_Order']}\">{$row['ID_Order']}</a><br>\n";

    $i++;
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