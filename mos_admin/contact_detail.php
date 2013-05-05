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
	  <h3>Contace detail</h3>
	  <div class="shortcutHome"></div>
     	<div class="informasi">
		รายละเอียดผู้ติดต่อ
        </div>
        <?php include('../config.inc'); 
		$ID=$_GET['ID_Pay'];
    $result = mysqli_query($con, "SELECT * FROM bso_contact  WHERE id_contact='{$ID}' " );
$row = mysqli_fetch_array($result);

        ?>
        <table class="data">
        <tr><td colspan="2" align="center"></td>
        </tr>
			<tr class="data">
				<th class="data" width="71">รหัส</th>
				<td width="611" class="data"><?php echo "{$row['id_contact']}" ?> </td>
			</tr>
			<tr class="data">
				<th class="data" width="71">ชื่อเรื่อง</th>
				<td class="data"><?php echo "{$row['title']}" ?></td>
			</tr>
              <tr class="data">
				<th class="data" width="71">รายละเอียด</th>
				<td class="data"><?php echo "{$row['detail']}" ?></td>
			</tr>
            <tr class="data">
				<th class="data" width="71">ชื่อผู้ติดต่อ</th>
				<td class="data"><?php echo "{$row['name']}" ?></td>
			</tr>
            <tr class="data">
				<th class="data" width="71">อีเมล์</th>
				<td class="data"><?php echo "{$row['email']}" ?></td>
			</tr>
                <tr class="data">
				<th class="data" width="71">เวลา</th>
				<td class="data"><?php echo "{$row['time']}" ?></td>
			</tr>
		</table>
		
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