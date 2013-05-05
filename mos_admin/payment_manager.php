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
	  <h3>Payment Manager</h3>
	  <div class="quoteOfDay"> <b>ระบบจัดการ การชำระเงิน:</b><br>
	    <i style="color: #5b5b5b;">"เครื่องมือจัดการระบบ อย่างรวดเร็ว"</i> </div>
	  <div class="clear"></div>
	  <table class="data">
	    <tr class="data">
	      <th class="data" width="50">รหัสจ่ายเงิน</th>
	      <th width="64" class="data">รหัสสั่งสินค้า</th>
	      <th width="53" class="data">จำนวนเงิน</th>
	      <th width="80" class="data">เวลา/วัน</th>
            <th width="392" class="data">หมายเหตุ</th>
	      <th class="data" width="27">ลบ</th>
        </tr>
        <?php include('../config.inc'); 
$result = mysqli_query($con, "SELECT *
     FROM  bso_payment Order By ID_Pay  DESC");
		while ($row = mysqli_fetch_array($result)) {
		?>
	    <tr class="data">
	      <td class="data" width="50"><?php echo  "{$row['ID_Pay']} ";  ?></td>
	      <td class="data"><?php echo  "<a href=\"order_detail.php?ID_Order={$row['ID_Order']}\">{$row['ID_Order']}</a> ";  ?></td>
	      <td class="data"><?php echo  "{$row['Nu_Pay']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['Da_Pay']} ";  ?></td>
           <td class="data"><?php echo  "{$row['Wh_Pay']} ";  ?></td>
	      <td class="data" width="27"><center>
   
      <?php print"<a href=\"payment_delete.php?ID_Pay={$row['ID_Pay']}\"><img src=\"mos-css/img/det.png\"></a>"; ?>
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