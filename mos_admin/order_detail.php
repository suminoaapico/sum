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
	  <div class="shortcutHome"> <a href="member_search.php"><img src="mos-css/img/posting.png"><br>
      ค้นหารายการสั่งซื้อ</a> </div>
	  <div class="shortcutHome"> <a href=member_add.php><img src="mos-css/img/photo.png"><br>
	    ดูแจ้งการชำระเงิน</a> </div>
	  <div class="clear">
	  <?php  include('../config.inc');
	  $ID_Order = $_GET["ID_Order"];
	  $result1 = mysqli_query($con, "SELECT *
     FROM bso_member, bso_order, bso_book
     WHERE bso_member.ID_Member = bso_order.ID_Member AND bso_book.ID_Book = bso_order.ID_Book AND ID_order='{$ID_Order}' " );
	  
$row1 = mysqli_fetch_array($result1);
echo "รหัสสมาชิก "." {$row1['ID_Member']} ";
echo "ชื่อสมาชิก "." {$row1['Na_Member']}<br/>";
echo "รหัสสั่งสินค้า "." {$row1['ID_Order']}<br/>";
echo '<form method="POST" action="order_status.php">';
echo "สถานะสั่งสินค้า "." {$row1['Status_o']}";
echo "<input type=\"hidden\" name =\"ID_Order\" value=\"{$row1['ID_Order']}\" />";
echo " <select  name=\"status\"/>";
echo "<option value=\"แก้ไขข้อมูล\">แก้ไขข้อมูล</option>";
echo "<option value=\"ยังไม่ได้ชำระเงิน\">ยังไม่ได้ชำระเงิน</option>";
echo "<option value=\"ชำระเงินไม่ครบ\">ชำระเงินไม่ครบ</option>";
echo "<option value=\"ชำระเงินแล้ว\">ชำระเงินแล้ว</option>";
echo"</select>"; 
echo "<input type=\"submit\" name=\"send\" value=\"แก้ไขข้อมูล\">" ;
echo "</form>";	  
	  
	  ?></div>
	  <table class="data">
	    <tr class="data">
	   
	      <th width="308" class="data">ชื่อ</th>
	      <th width="38" class="data">จำนวน</th>
	      <th width="147" class="data">วันที่สั่ง</th>
              <th width="76" class="data">ราคาต่อหน่วย</th>
            <th width="101" class="data">ราคารวม</th>
	    
        </tr>
        <?php include('../config.inc'); 
$ID_Order = $_GET["ID_Order"];
$result = mysqli_query($con, "SELECT *
     FROM bso_member, bso_order
     WHERE bso_member.ID_Member = bso_order.ID_Member AND  ID_order='{$ID_Order}' " );
	 

		while ($row = mysqli_fetch_array($result)) {
		$Va_Book = $row['Va_Book']* $row['Number'];
		?>
	    <tr class="data">
	      <td class="data"><?php echo  "{$row['Na_Book']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['Number']} ";  ?></td>
             <td class="data"><?php echo  "{$row['Da_Order']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['Va_Book']} ";  ?></td>
        <td width="101" class="data"><?php echo  "{$Va_Book} ";  ?></td>
	  
        </tr>
        <?php }?>
        <?php 
  $sql = mysqli_query($con,"SELECT SUM(Va_Book*Number) FROM `bso_order` WHERE ID_Order='{$ID_Order}'");
$row2 = mysqli_fetch_array($sql);
$Sum = $row2['SUM(Va_Book*Number)'];

		?>
        <tr class="data">
        <td class="data" colspan="5" align="right"> <?php echo "รวม = ";
	include('../promotion.php');	
	echo $Sum."<br>"; 
	echo "ส่วนลด".$Di."<br>"; 
	echo "ยอดสุทธิ". $Dis; 
		?></td></tr>
      </table>
      <?php
      echo"<a href=\"../tcpdf.php?ID_Order={$row1['ID_Order']}&&User={$row1['Us_Member']}\" target=\"new\"><p align=\"center\"><img src=\"../images/print.png\"></p></a>";
	  ?>
	</div>
	<!-- InstanceEndEditable -->
	<div class="clear"></div>
<div id="footer">
	&copy; 2012 Admin Bookshoponline  By Programmer INDY<a href="../index.php" target="_blank">กลับไปหน้าเว็บ</a>
</div>
</div>
</body>
<!-- InstanceEnd --></html>