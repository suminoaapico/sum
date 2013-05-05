
<html>
<!-- แสดงรายชื่อหนังสือ -->
<?php include('../config.inc');
$date = date("H:i:s m/d/Y");
echo "<br>".$date; 
$result = mysqli_query($con, "SELECT *
     FROM bso_member, bso_order, bso_payment
     WHERE   bso_order.ID_Order = bso_payment.ID_Order GROUP BY bso_order.ID_Order " );
echo "<h3 align=\"center\">รายการสั่งซื้อ</h3>\n";
echo "<table align=\"center\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\"  width=\"100%\">\n";
echo "<tr style=\"background-color:#C2D9FE\">
<th>รหัสจ่ายเงิน</th>
<th>รหัสสั่งสินค้า</th>
<th>จำนวนเงิน</th>
<th>เวลา/วัน</th>
<th>หมายเหตุ</th>
</tr>\n";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr style=\"background-color:#F2F2F2\">
  <td>{$row['ID_Pay']} </td>";
  echo "<td><a href=\"../member/order_detail.php?ID_Order={$row['ID_Order']}\"> {$row['ID_Order']}</a> </td>";
  echo "<td> {$row['Nu_Pay']} </td>";
  echo "<td> {$row['Da_Pay']} </td>
  <td>{$row['Wh_Pay']}</td>
  </tr>";
}
echo "</table>\n";

mysqli_close($con);
?>
 
 </html>

  
    
    