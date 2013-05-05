
<html>
<!-- แสดงรายชื่อหนังสือ -->
<?php include('../config.inc');

$result = mysqli_query($con, "SELECT *
     FROM bso_contact  ORDER BY id_contact DESC " );
echo "<h3 align=\"center\">ลูกค้าติดต่อ</h3>\n";
echo "<table align=\"center\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\"  width=\"100%\">\n";
echo "<tr style=\"background-color:#C2D9FE\">
<th>รหัส</th>
<th>ชื่อเรื่อง</th>
<th>ชื่อผู้ติดต่อ</th>
<th>อีเมล์</th>
<th>เวลา</th>

</tr>\n";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr style=\"background-color:#F2F2F2\">
  <td>{$row['id_contact']}</td>";
  echo "<td><a href=\"admin_contact_detail.php?ID={$row['id_contact']}\"> {$row['title']}</a> </td>";
  echo "<td> {$row['name']} </td>";
  echo "<td> {$row['email']} </td>";
  echo "<td>{$row['time']} </td>";
 
 echo"</tr>";
}
echo "</table>\n";

mysqli_close($con);
?>
 
 </html>

  
    
    