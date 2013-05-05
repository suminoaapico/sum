<?php session_start();  include('config.inc'); ?>
<html><!-- InstanceBegin template="/Templates/index2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>BookShopOnline</title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
			
			<table width="996"  border="0" cellspacing="0" cellpadding="0" align="center">
			  <tr>
				<td height="607" valign="top">
							<table width="996"  border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td width="285" height="52"><a href="#"><img src="images/logo.jpg" alt="" width="415" height="52" border="0"></a></td>
								<td width="711" class="menu">
										<table width="581"  border="0" cellspacing="0" cellpadding="0">
										  <tr>
											<td width="85"><span class="style4"><a href="index.php" id="whitetxt">Home</a></span></td>
											<td width="116" align="center"><span class="style4"><a href="book_list_all.php" id="whitetxt">Book</a></span></td>
                                        
											
											
                                            <?php
											
if (isset($_SESSION["valid_user"])) {
	echo"<td width=\"98\" align=\"center\"><span class=\"style4\"><a href=\"member_detail.php\" id=\"whitetxt\">My Account</a></span></td>";
	echo"<td width=\"98\" align=\"center\"><span class=\"style4\"><a href=\"logout.php\" id=\"whitetxt\">Logout</a></span></td>";
}
else {
	echo"<td width=\"98\" align=\"center\"><span class=\"style4\"><a href=\"register.php\" id=\"whitetxt\">Regiter</a></span></td>";
	echo"<td width=\"98\" align=\"center\"><span class=\"style4\"><a href=\"login.php\" id=\"whitetxt\">Login</a></span></td>";
}
											?>
											<td width="196"><span class="style4"><img src="images/spacer.gif" alt="" width="20" height="1"><a href="contact_form.php" id="whitetxt">Help</a></span></td>
										  </tr>
										</table>
								</td>
							  </tr>
							</table>
							<table width="100%"  border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td width="60%" height="66"  align="life" valign="top"><br><?php // if (isset($_SESSION["valid_user"])) { echo "คุณลงชื่อเข้าใช้ในชื่อ : ".$_SESSION["valid_user"]; } ?>
								
								  </td>
								  <td width="40%">
										  <table width="399"  border="0" cellspacing="0" cellpadding="0">
											<tr><?php 
											if (isset($_SESSION["valid_user"])) {
												$user = $_SESSION["valid_user"];
												echo"<td width=\"157\">&nbsp;</td>
												<td width=\"58\"><a href=\"basket_show.php\"><img src=\"images/trash.jpg\" alt=\"\" width=\"47\" height=\"48\" border=\"0\"></a></td><td width=\"184\"><a href =\"payment_form.php\"><span class=\"style6\">แจ้งการชำระเงิน:</span></a> <br>";
/** 												
$result = mysqli_query($con, "SELECT bso_basket.ID_Basket ,bso_basket.ID_Book,bso_basket.ID_Member,bso_basket.Number ,bso_book.Na_Book, bso_basket.ID_Basket
FROM bso_basket,bso_member,bso_book
WHERE bso_member.Us_Member = '{$user}' AND bso_member.ID_Member = bso_basket.ID_Member AND bso_basket.ID_Book = bso_book.ID_Book ");
$row = mysqli_fetch_array($result);

SELECT SUM( Number ) AS Total
FROM bso_basket  */
$result_member = mysqli_query($con, "SELECT ID_Member FROM bso_member WHERE Us_Member='{$user}' ");
 // WHERE bso_member.Us_Member = '{$user}' AND bso_member.ID_Member = bso_basket.ID_Member AND bso_basket.ID_Book = bso_book.ID_Book ");		
$row = mysqli_fetch_array($result_member);		
									$result_member = mysqli_query($con, "SELECT 	SUM( Number ) AS Total  FROM bso_basket WHERE ID_Member={$row['ID_Member']} ");	
		                           $row_member = mysqli_fetch_array($result_member);
								   echo"<a href=\"basket_show.php\"><span class=\"style7\">{$row_member['Total']}  เล่ม</span></a></td>";
													}
											else {
												echo"<td></td>";
													}
												?>
											</tr>
										  </table>
								  </td>
								</tr>
							</table>
							<table width="996"  border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><a href="#"><img src="images/header.jpg" alt="" width="996" height="300" border="0"></a></td>
								</tr>
							</table>
						<table width="996"  border="0" cellspacing="0" cellpadding="0">
							<tr align="left" valign="top">
									  <td width="202" height="334">
												  <table width="202"  border="0" cellspacing="0" cellpadding="0">
													<tr>
													  <td height="320" align="left" valign="top">
														<div class="linkmenu" align="center"><a href="book_search2.php"><img src="images/search.png"></a></div><br>
                                                        
                                                        <div class="category"><img src="images/spacer.gif" alt="" width="30" height="19">Categories<a href="#"><img src="images/spacer.gif" alt="" width="10" height="10" border="0"></a></div><br>
                                                        
                                                        
<?php                                             
	 $sql = mysqli_query($con,"SELECT * FROM `bso_book_category` LIMIT 1, 30 ");
	while($result1 = mysqli_fetch_array($sql)){
		echo"<div class=\"linkmenu\"><img src=\"images/spacer.gif\" alt=\"\" width=\"20\" height=\"19\"><span class=\"red\">&bull;</span>&nbsp;&nbsp;<a href=\"book_list.php?ID_Ca={$result1['ID_Ca']}\">{$result1['Na_Ca']}</a></div>	";
					}
														
	?>										

									

													</td>
													</tr>
													<tr>
													  <td height="26" align="center"></td>
                                      
													</tr>
													<tr>
													  <td align="center"><a href="#"><img src="images/banner.gif" alt="" width="197" height="300" border="0"></a></td>
													</tr>
												  </table>
									  </td>
									  <td width="20">&nbsp;</td>
									  <td width="774"><table width="774"  border="0" cellspacing="0" cellpadding="0">
										    <tr>
																<td width="22">&nbsp;</td>
																<td width="729"><!-- InstanceBeginEditable name="EditRegion1" -->
																  <table width="774"  border="0" cellspacing="0" cellpadding="0">
																    <tr>
																      <td height="40" class="popular"><img src="images/spacer.gif" alt="" width="27" height="19"><span class="popular_text">Login</span></td>
															        </tr>
																    <tr>
																      <td height="138" valign="top" class="popular_center"><table width="774" height="139"  border="0" cellpadding="0" cellspacing="0">
																        <tr>
																          <td width="15">&nbsp;</td>
																          <td  align="center"width="743"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
																            <tr>
	<?php
if (isset($_SESSION["valid_user"])) {
  echo "คุณได้เข้าสู่ระบบแล้ว<br>";
  echo '<a href="member_detail.php">โปรไฟล์</a>'." | ";
  echo '<a href="logout.php">ออกจากระบบ</a><hr>';
}
else {
  if (isset($_POST["send"]))
    process_form();
  else
    show_form();
}

//ฟังก์ชั่นที่ใช้แสดงฟอร์ม
function show_form() {
  echo <<<HTMLBLOCK
<h3>เข้าสู่ระบบ</h3>
<form method="POST" action="{$_SERVER['PHP_SELF']}">
  ชื่อผู้ใช้ :&nbsp;&nbsp; <input type="text" name="uname"><br>
  รหัสผ่าน:&nbsp; <input type="password" name="passwd"><br>
  <input type="submit" name="send" value="เข้าสู่ระบบ">
</form>
HTMLBLOCK;
}

//ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
function process_form() {
  $user = trim($_POST["uname"]);
  $pass = trim($_POST["passwd"]);

  if (($user != "") && ($pass != "")) {
    if (validate_user($user, $pass)) {
      $_SESSION["valid_user"] = $user;
	  
	  echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=member_detail.php\">";
      echo "<h3>ยินดีต้อนรับคุณ $user</h3>";
      echo "คุณได้เข้าสู่ระบบแล้ว<br>";
      echo '<a href="logout.php">ออกจากระบบ</a><br>';
	  echo '<a href="order_list_all.php">ดูรายการสั่งสินค้า</a>'."<br>";
	  echo '<a href="member_detail.php">โปรไฟล์</a>';


    }
    else {
      echo '<font color="red">ชื่อผู้ใช้และ/หรือรหัสผ่านไม่ถูกต้อง</font>';
      show_form();
    }
  }
  else {
    echo '<font color="red">คุณยังไม่ได้ป้อนชื่อผู้ใช้และ/หรือรหัสผ่าน</font>';
    show_form();
  }
}

//ฟังก์ชั่นที่ใช้ตรวจสอบชื่อผู้ใช้และรหัสผ่าน ซึ่งจะถูกเรียกใช้ในฟังก์ชั่น process_form
function validate_user($u, $p) {
    include('config.inc');
  $cn = @mysqli_connect($db_ad,$db_user,$db_pass);
  if (!$cn) {
    echo "ไม่สามารถเชื่อมต่อกับ MySQL Server ได้<br>";
    exit;
  }
  mysqli_select_db($cn,$db_name);
  $sql = "SELECT * FROM bso_member WHERE Us_Member='$u' AND Pa_Member=('$p');";
  $result = mysqli_query($cn, $sql);
  $row_count = mysqli_num_rows($result);
  mysqli_close($cn);

  return $row_count;
}
?>
															                </tr>
																            </table>
																            </td>
																          <td width="16">&nbsp;</td>
															            </tr>
																        </table></td>
															        </tr>
																    <tr>
																      <td valign="top"><img src="images/close.gif" alt="" width="774" height="9"></td>
															        </tr>
															    </table>
																<!-- InstanceEndEditable --></td>
																<td width="23">&nbsp;</td>
									    </tr>
														  <tr>
																<td height="479">&nbsp;</td>
															<td align="left" valign="top"><!-- InstanceBeginEditable name="EditRegion2" --><!-- InstanceEndEditable --></td>
																<td>&nbsp;</td>
														  </tr>
													</table>
							  </td>
							</tr>
						  </table>
						  <table width="996"  border="0" cellspacing="0" cellpadding="0">
							<tr>
							  <td><img src="images/footer.jpg" alt="" width="996" height="5"></td>
							</tr>
							<tr>
							  <td height="76"><table width="996"  border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td width="329" height="78" align="right"><a href="#"><span class="category"><a href="#"><img src="images/spacer.gif" alt="" width="10" height="10" border="0"></a><img src="images/hard.jpg" alt="" width="191" height="50" border="0"></td>
								  <td width="14">&nbsp;</td>
								  <td width="653"><span class="style7"><a href="index.php">หน้าแรก</a>&nbsp; | &nbsp;&nbsp;<a href="book_list_all.php">รายการหนังสือ </a>&nbsp;&nbsp; |&nbsp; &nbsp;<a href="promotion_pic.php">โปรโมชั่น</a>&nbsp; &nbsp;|&nbsp;&nbsp; <a href="mos_admin">จัดการระบบ</a>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="about.php">เกี่ยวกับเรา</a></span><br>
									<a href="#">design by programming indy group Comsice SDU</a> Copyright &copy; 2013 </td>
								</tr>
							  </table></td>
							</tr>
						  </table>
				  
				</td>
			</tr>
		</table>
</body>
<!-- InstanceEnd --></html>
