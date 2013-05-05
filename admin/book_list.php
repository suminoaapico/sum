<html>
<!-- แสดงรายชื่อหนังสือ -->
<?php include('../config.inc');
$result = mysqli_query($con, "SELECT * FROM bso_book,bso_book_category 
WHERE bso_book.ID_Ca=bso_book_category.ID_Ca");

echo "<h3 align=\"center\">รายการหนังสือ</h3>\n";
echo "<table align=\"center\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\" width=\"100%\">\n";
echo "<tr style=\"background-color:#C2D9FE\"><th>หมายเลข</th><th>ชื่อเรื่อง</th><th>หมวดหมู่</th><th>ราคา</th><th>แก้ไข</th><th>ลบ</th></tr>\n";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr style=\"background-color:#F2F2F2\"><td> {$row['ID_Book']} </td>";
  echo "<td> {$row['Na_Book']} </td>";
  echo "<td> {$row['Na_Ca']} </td>";
  echo "<td align=\"right\"> {$row['Va_Book']} </td>\n";
  echo "<td><a href=\"book_edit.php?ID_Book={$row['ID_Book']}\">edit</td>";
  echo "<td><a href =\"book_delete.php?ID_Book={$row['ID_Book']}\">x</></td></tr>";
}
echo "</table>\n";
echo "<a href =\"book_add_form.php\">เพิ่มหนังสือ</a>";
mysqli_close($con);
?>
 
 </html>

  
    
    