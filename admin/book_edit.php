<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขหมวดหมู่</title>
</head>

<body>
<?php  include('../config.inc');

$ID = $_GET['ID_Book'];
$result = mysqli_query($con, "SELECT * FROM bso_book WHERE ID_Book = '{$ID}'" );
$row = mysqli_fetch_array($result);
?>
<form method="POST" action="book_edit_process.php">
<?php  
echo "รหัสหนังสือ"."<input name=\"ID_Book\" type = \"text\" value = {$row['ID_Book']}><br/>";
echo "ชื่อหนังสือ"."<input name=\"Na_Book\" type = \"text\" value = {$row['Na_Book']}><br/>";
echo "รายละเอียด"."<input name=\"De_Book\" type = \"text\" value = {$row['De_Book']}><br/>";
echo "ราคาหนังสือ"."<input name=\"Va_Book\" type = \"text\" value = {$row['Va_Book']}><br/>";

$result1 = mysqli_query($con, "SELECT * FROM bso_book_category LIMIT 1, 30");
echo "หมวดหมู่ <select  name=\"ID_Ca\"/>";
while ($row1 = mysqli_fetch_array($result1)) {
echo "<option value=\"{$row1['ID_Ca']}\">{$row1['Na_Ca']}</option>";
}
echo"</select><br />"; 


echo "<input type=\"submit\" name=\"send\" value=\"แก้ไขข้อมูล\">" ;
echo"<a href=\"admin_book_edit_pic.php?ID_Book=$ID\">แก้ไขรูป</a>";
?>
</form>

</body>
</html>



