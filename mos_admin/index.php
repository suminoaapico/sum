<?php include('admin_only.php');?>
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
	  <h3>Dashboard</h3>
   
	  <div class="quoteOfDay"> <b>เมนูลัด :</b><br>
	    <i style="color: #5b5b5b;">"เครื่องมือจัดการระบบ อย่างรวดเร็ว"</i> </div>
	  <div class="shortcutHome"> <a href="payment_manager.php"><img src="mos-css/img/posting.png"><br>
	    การชำระเงิน</a> </div>
	  
	  <div class="shortcutHome"> <a href="order_manager.php"><img src="mos-css/img/halaman.png"><br>
	    สถานะ order</a> </div>
        <div class="shortcutHome"> <a href="book_add.php"><img src="mos-css/img/photo.png"><br>
	    เพิ่มหนังสือ</a> </div>
	  <div class="shortcutHome"><a href="member_add.php"><img src="mos-css/img/user.png"><br>
	    เพิ่มสมาชิก</a> </div>
	  <div class="shortcutHome"> <a href="contact_manager.php"><img src="mos-css/img/bukutamu.png"><br>
	    จดหมาจากผู้ติดต่อ</a> </div>
	  <div class="clear"></div>
	  <div id="smallRight">
	    <h3>Information</h3>
	    <table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
	      <tr>
	        <td style="border: none;padding: 4px;">จำนวนหนังสือ</td>
            <?php
			include('../config.inc');
			 $sql = mysqli_query($con,"SELECT COUNT(`Na_Book`)  FROM `bso_book`");
			$row = mysqli_fetch_array($sql);
			
			$sql1 = mysqli_query($con,"SELECT COUNT(`Us_Member`)  FROM `bso_member`");
			$row1= mysqli_fetch_array($sql1);
			
			$sql2 = mysqli_query($con,"SELECT DISTINCT ID_Order AS Amount FROM bso_order ");
			$row2= mysqli_fetch_array($sql2);
			
			?>
	        <td style="border: none;padding: 4px;"><b><?php   echo $row['COUNT(`Na_Book`)'];?></b></td>
          </tr>
	      <tr>
	        <td style="border: none;padding: 4px;">จำนวนสมาชิก</td>
	        <td style="border: none;padding: 4px;"><b><?php   echo $row1['COUNT(`Us_Member`)']; ?></b></td>
          </tr>
	      <tr>
	        <td style="border: none;padding: 4px;">รายการสั่งซื้อ</td>
	        <td style="border: none;padding: 4px;"><b><?php 
			$i=0;
			 while($rw= mysqli_fetch_array($sql2)){
	    	       $j=$row2['Amount'];
				   $i++;
			  }
			  echo $i; 
			  ?>
              </b>
               
               </td>
          </tr>
        </table>
      </div>
	  <div id="smallRight">
	    <table align="center" style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
	      <tr align="center">
	        <td style="border: none;padding: 4px;"><img src="mos-css/img/man.png" width="130" height="189"></td>
          </tr>
        </table>
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