<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขหมวดหมู่</title>
</head>

<body>
<?php  include('../config.inc');

$ID = $_GET['ID_Ca'];
$result = mysqli_query($con, "SELECT * FROM bso_book_category WHERE ID_Ca = '{$ID}'" );
$row = mysqli_fetch_array($result);
?>
<form method="POST" action="book_category_edit_process.php">
<?php  
echo "รหัสหมวดหมู่";
echo "<input name=\"ID_Ca\" type = \"text\" value = {$row['ID_Ca']}>";
echo "<input name=\"Na_Ca\" type = \"text\" value = {$row['Na_Ca']}>";
echo "<input type=\"submit\" name=\"send\" value=\"แก้ไขข้อมูล\">" ;

?>
</form>

</body>
</html>



