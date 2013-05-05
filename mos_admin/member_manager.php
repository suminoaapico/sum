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
	  <h3>Member Manager</h3>
	  <div class="quoteOfDay"> <b>ระบบจัดการสมาชิก :</b><br>
	    <i style="color: #5b5b5b;">"เครื่องมือจัดการระบบ อย่างรวดเร็ว"</i> </div>
	  <div class="shortcutHome"> <a href="member_search.php"><img src="mos-css/img/quote.png"><br>
      ค้นหาสมาขิก</a> </div>
	  <div class="shortcutHome"> <a href=member_add.php><img src="mos-css/img/photo.png"><br>
	    เพิ่มสมาชิก</a> </div>
	  <div class="clear">Member List</div>
	  <table class="data">
	    <tr class="data">
	      <th class="data" width="69">รหัส</th>
	      <th width="199" class="data">user</th>
	      <th width="146" class="data">ชื่อ</th>
	      <th width="164" class="data">เบอร์โทร</th>
	      <th class="data" width="92">จัดการ</th>
        </tr>
        <?php include('../config.inc'); 
		$result = mysqli_query($con, "SELECT * FROM bso_member;");
		while ($row = mysqli_fetch_array($result)) {
		?>
	    <tr class="data">
	      <td class="data" width="69"><?php echo  "{$row['ID_Member']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['Us_Member']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['Na_Member']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['Te_Member']} ";  ?></td>
	      <td class="data" width="92"><center>
	       <?php print"<a href=\"member_detail.php?ID_Member={$row['ID_Member']}\"><img src=\"mos-css/img/detail.png\"></a>"; ?>&nbsp;&nbsp;&nbsp;
           <?php print"<a href=\"member_edit.php?ID_Member={$row['ID_Member']}\"><img src=\"mos-css/img/edit.png\"></a>"; ?>&nbsp;&nbsp;&nbsp;
      <?php print"<a href=\"member_delete.php?ID_Member={$row['ID_Member']}\"><img src=\"mos-css/img/det.png\"></a>"; ?>&nbsp;&nbsp;&nbsp;
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