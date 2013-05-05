<?php 
session_start();
include('config.inc'); ?>
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
																<td width="729"><!-- InstanceBeginEditable name="EditRegion1" --><!-- InstanceEndEditable --></td>
																<td width="23">&nbsp;</td>
									    </tr>
														  <tr>
																<td height="479">&nbsp;</td>
															<td align="left" valign="top"><!-- InstanceBeginEditable name="EditRegion2" -->
															
<?php include('config.inc');

$id_order = $_POST['id_order'] ;
$number = $_POST['number'] ;
$date = $_POST['date'] ;
$comment = $_POST['comment'] ;

if($id_order =="" or $number =="" or $date ==""){ echo " คุณกรอบกข้อมูลไม่ครบ "; exit;}

?>

<?php 

$sql = "INSERT INTO `bso_payment`(`ID_Order`, `Nu_Pay`, `Da_Pay`, `Wh_Pay`) VALUES ('{$id_order}','{$number}','{$date}','{$comment}')";

$result = mysqli_query($con, $sql);

  echo "<h3>ผลการแจ้งการชำระเงิน</h3>\n";
  if ($result) {
    echo "แจ้งข้อมูลสำเร็จ " ."<br>ระบบจะทำการตรวจสอบผลการโอนเงินไม่เกิน 24 ชั่วโมง ครับ";
    
  }
  else {
    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล กรุณตรวจข้อมของท่านอีกครั้ง<br>";
  }

  mysqli_close($con);
  
?>


															
															
															<!-- InstanceEndEditable --></td>
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








