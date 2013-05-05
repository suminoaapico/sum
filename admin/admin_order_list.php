<html>
<!-- แสดงรายชื่อหนังสือ -->
<?php include('../config.inc');
$date = date("H:i:s m/d/Y");
echo "<br>".$date; 
/*
$date  = getdate();
echo $date['month'];
echo $date['hours'];
echo $date['minutes'];
echo $date['seconds'];
*/
//$user = $_SESSION["valid_user"];
$result = mysqli_query($con, "SELECT * FROM bso_member, bso_order, bso_book
WHERE bso_member.ID_Member = bso_order.ID_Member    GROUP BY bso_order.ID_Order " );
//$result = mysqli_query($con, "SELECT * FROM bso_member, bso_order, bso_book
//WHERE bso_member.ID_Member = bso_order.ID_Member AND bso_book.ID_Book = bso_order.ID_Book   GROUP BY bso_order.ID_Order " );


/*
$result1 = mysqli_query($con, "SELECT *
FROM bso_member, bso_order, bso_book
WHERE bso_member.ID_Member = bso_order.ID_Member AND bso_book.ID_Book = bso_order.ID_Book  bso_order.Status'จัดส่งแล้ว' GROUP BY bso_order.ID_Order " );
echo "<a href=\"admin_order_detail.php?ID_Order=\">ดู</a>"; 
*/

echo "<h3 align=\"center\">รายการสั่งซื้อ</h3>\n";
echo "<table align=\"center\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\"  width=\"100%\">\n";
echo "<tr style=\"background-color:#C2D9FE\">
<th>รหัสสั่งสินค้า</th>
<th>รหัสสมาชิก</th>
<th>ชื่อสมาชิก</th>
<th>เวลา/วัน</th>
<th>สถานะ</th>
</tr>\n";
 while($row = mysqli_fetch_array($result)){
  echo "<tr style=\"background-color:#F2F2F2\">
  <td><a href=\"admin_order_detail.php?ID_Order={$row['ID_Order']}\">{$row['ID_Order']}</a> </td>";
  echo "<td> {$row['ID_Member']} </td>";
  echo "<td> {$row['Na_Member']} </td>";
  echo "<td> {$row['Da_Order']} </td>
  <td>{$row['Status']}</td>
  </tr>";
}
echo "</table>\n";

mysqli_close($con);
?>
 
 </html>

  
    
    