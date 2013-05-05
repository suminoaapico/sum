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
	  <h3>Contact Manager</h3>
	  <div class="quoteOfDay"> <b>ระบบจัดการ ผู้ติดต่อ:</b><br>
	    <i style="color: #5b5b5b;">"เครื่องมือจัดการระบบ อย่างรวดเร็ว"</i> </div>
	  <div class="clear"></div>
	  <table class="data">
	    <tr class="data">
	      <th class="data" width="50">รหัส</th>
	      <th width="181" class="data">ชื่อเรื่อง</th>
	      <th width="96" class="data">ชื่อผู้ติดต่อ</th>
	      <th width="138" class="data">เวลา</th>
            <th width="174" class="data">อีเมล์</th>
	      <th class="data" width="27">ลบ</th>
        </tr>
        <?php include('../config.inc'); 
$result = mysqli_query($con, "SELECT *
     FROM bso_contact  ORDER BY id_contact DESC " );
		while ($row = mysqli_fetch_array($result)) {
		?>
	    <tr class="data">
	      <td class="data" width="50"><?php echo  "{$row['id_contact']} ";  ?></td>
	      <td class="data"><?php echo  "<a href=\"contact_detail.php?ID_Pay={$row['id_contact']}\">{$row['title']}</a> ";  ?></td>
	      <td class="data"><?php echo  "{$row['name']} ";  ?></td>
	      <td class="data"><?php echo  "{$row['time']} ";  ?></td>
           <td class="data"><?php echo  "{$row['email']} ";  ?></td>
	      <td class="data" width="27"><center>
   
      <?php print"<a href=\"contact_delete.php?ID_Contact={$row['id_contact']}\"><img src=\"mos-css/img/det.png\"></a>"; ?>
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