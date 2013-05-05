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
	    <i style="color: #5b5b5b;">"เครื่องมือจัดการระบบ อย่างรวดเร็ว"</i> </div>
	  <div class="shortcutHome"> <a href="order_search.php"><img src="mos-css/img/quote.png"><br>
      ค้นหารายการสั่งซื้อ</a> </div>
	  <div class="shortcutHome"> <a href=payment_manager.php><img src="mos-css/img/photo.png"><br>
	    ดูแจ้งการชำระเงิน</a> </div>
	  <div class="clear"></div>
	  <table class="data">
	    <tr class="data">
	      <th class="data" width="68">รหัสสั่งสินค้า</th>
	      <th width="91" class="data">รหัสสมาชิก</th>
	      <th width="161" class="data">ชื่อสมาชิก</th>
	      <th width="143" class="data">เวลา/วัน</th>
            <th width="104" class="data">สถานะ</th>
	      <th class="data" width="99">จัดการ</th>
        </tr>
        <?php include('../config.inc'); 
	$result = mysqli_query($con, "SELECT * FROM bso_member, bso_order, bso_book
WHERE bso_member.ID_Member = bso_order.ID_Member    GROUP BY bso_order.ID_Order " );
		while ($row = mysqli_fetch_array($result)) {
		?>
	    <tr class="data">
	      <td class="data" width="68"><?php echo  "{$row['ID_Order']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['ID_Member']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['Na_Member']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['Da_Order']} ";  ?></td>
           <td class="data"><?php echo  "{$row['Status_o']} ";  ?></td>
	      <td class="data" width="99"><center>
	       <?php print"<a href=\"order_detail.php?ID_Order={$row['ID_Order']}\"><img src=\"mos-css/img/detail.png\"></a>"; ?>&nbsp;&nbsp;&nbsp;

      <?php print"<a href=\"order_delete.php?ID_Order={$row['ID_Order']}\"><img src=\"mos-css/img/det.png\"></a>"; ?>&nbsp;&nbsp;&nbsp;
          </center></td>
        </tr>
        <?php }?>
      </table>
	</div>
	<!-- InstanceEndEditable -->
	<div class="clear"></div>
<div id="footer">
	&copy; 2012 Admin Bookshoponline  By Programmer INDY<a href="../index.php" target="_blank">กลับไปหน้าเว็บ</a>
</div>
</div>
</body>
<!-- InstanceEnd --></html>