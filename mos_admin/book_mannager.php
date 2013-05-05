<html><!-- InstanceBegin template="/Templates/admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Admin MOS Template</title>
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
	  <h3>Book Manager</h3>
	  <div class="quoteOfDay"> <b>ระบบจัดการหนังสือ :</b><br>
	    <i style="color: #5b5b5b;">"เครื่องมือจัดการระบบ อย่างรวดเร็ว"</i> </div>
	  <div class="shortcutHome"> <a href="book_search.php"><img src="mos-css/img/quote.png"><br>
	    ค้นหาหนังสือ</a> </div>
	  <div class="shortcutHome"> <a href=book_add.php><img src="mos-css/img/photo.png"><br>
	    เพิ่มหนังสือ</a> </div>
<div class="shortcutHome"> <a href=book_ca_mannager.php><img src="mos-css/img/photo.png"><br>
	    จัดการหมวดหมู่</a> </div>
	  <div class="clear">BookList</div>
	  <table class="data">
	    <tr class="data">
	      <th class="data" width="69">รหัส</th>
	      <th width="358" class="data">ชื่อ</th>
	      <th width="106" class="data">หมวดหมู่</th>
	      <th width="45" class="data">ราคา</th>
	      <th class="data" width="92">จัดการ</th>
        </tr>
        <?php include('../config.inc'); 
		$result = mysqli_query($con, "SELECT * FROM bso_book,bso_book_category 
WHERE bso_book.ID_Ca=bso_book_category.ID_Ca");
		while ($row = mysqli_fetch_array($result)) {
		?>
	    <tr class="data">
	      <td class="data" width="69"><?php echo  "{$row['ID_Book']}";  ?></td>
	      <td class="data"><?php echo  "{$row['Na_Book']}";  ?></td>
	      <td class="data"><?php echo  "{$row['Na_Ca']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['Va_Book']} ";  ?></td>
	      <td class="data" width="92"><center>
	       <?php print"<a href=\"book_detail.php?ID_Book={$row['ID_Book']}\"><img src=\"mos-css/img/detail.png\"></a>"; ?>&nbsp;&nbsp;&nbsp;
           <?php print"<a href=\"book_edit.php?ID_Book={$row['ID_Book']}\"><img src=\"mos-css/img/edit.png\"></a>"; ?>&nbsp;&nbsp;&nbsp;
      <?php print"<a href=\"book_delete.php?ID_Book={$row['ID_Book']}\"><img src=\"mos-css/img/det.png\"></a>"; ?>&nbsp;&nbsp;&nbsp;
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