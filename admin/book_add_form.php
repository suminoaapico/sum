<?php include('../config.inc'); ?>
<html>
<head>
	
	<title>เพิ่มหนังสือ</title>
</head>

<body>
<form action="book_add.php" method="post" enctype="multipart/form-data">
</a>รหัสหนังสือ:<input type="text" name="ID_Book"/><br />
ชื่อหนังสือ :<input type="text" name="Na_Book"/><br />
รายละเอียด :<input type="text" name="De_Book"/><br />
ราคา : <input size="3"  name="Va_Book"/>บาท<br />
<?php $result = mysqli_query($con, "SELECT * FROM bso_book_category "); 
$row = mysqli_fetch_array($result);

echo "หมวดหมู่ <select  name=\"ID_Ca\"/>";
while ($row = mysqli_fetch_array($result)) {
echo "<option value=\"{$row['ID_Ca']}\">{$row['Na_Ca']}</option>";
}
echo"</select><br />";        
 ?>        

รูปภาพ<input type="file" name="fileUpload" id="file"/><br/>
<input type="submit" name="submit" value="บันทึก"/>

</form>
</body>
</html>