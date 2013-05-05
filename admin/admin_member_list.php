<html>
<!-- แสดงรายชื่อหนังสือ -->
<?php include('../config.inc'); 
mysql_query("set names tis620");
$result = mysqli_query($con, "SELECT * FROM bso_member;");
echo "<h3 align=\"center\">รายการชื่อสมาชิก</h3>\n";
echo "<table align=\"center\" border=\"1\" cellpadding=\"3\" width=\"100%\">\n";
echo "<tr><th>รหัสสมาชิก</th><th>ชื่อสมาชิก</th><th>ที่อยู่</th><th>เบอร์โทร</th><th>อีเมล์</th><th>แก้ไข</th><th>ลบ</th></tr>\n";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr><td> {$row['ID_Member']} </td>";
  echo "<td> {$row['Na_Member']} </td>";
  echo "<td> {$row['Ad_Member']} </td>";
  echo "<td> {$row['Te_Member']} </td>";
  echo "<td> {$row['Em_Member']} </td>";
  echo "<td><a href=\"admin_member_edit.php?ID_Member={$row['ID_Member']}\">e</td>";
  echo "<td><a href =\"admin_member_delete.php?ID_Member={$row['ID_Member']}\">x</></td>";
}
echo "</table>\n";
echo "<a href =\"admin_member_add.php\">เพิ่มสมาชิก่</a>";
mysqli_close($con);
?>
 
 </html>

  
    
    