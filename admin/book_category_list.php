<html>
<!-- แสดงรายชื่อหนังสือ -->
<?php include('../config.inc'); 
$result = mysqli_query($con, "SELECT * FROM bso_book_category LIMIT 1, 30");

echo "<h3 align=\"center\">รายการหนังสือ</h3>\n";
echo "<table align=\"center\" border=\"1\" cellpadding=\"3\" width=\"100%\">\n";
echo "<tr><th>หมายเลข</th><th>หมวดหมู่</th><th>แก้ไข</th><th>ลบ</th></tr>\n";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr><td> {$row['ID_Ca']} </td>";
  echo "<td> {$row['Na_Ca']} </td>";
  echo "<td><a href=\"book_category_edit.php?ID_Ca={$row['ID_Ca']}\">e</td>";
  echo "<td><a href =\"book_category_delete.php?ID_Ca={$row['ID_Ca']}\">x</></td>";
}
echo "</table>\n";
echo "<a href =\"book_category_add.php\">เพิ่มหมวดหมู่</a>";
mysqli_close($con);
?>
 
 </html>

  
    
    