<?php  include('../config.inc');  
$ID=$_GET['ID']; ?>
<html>
<!-- แสดงรายชื่อหนังสือ -->
<h3 align="center">รายละเอียดผู้ติดต่อ</h3>
<?php
$result = mysqli_query($con, "SELECT * FROM bso_contact  WHERE id_contact='{$ID}' " );
$row = mysqli_fetch_array($result);

?>
<table align="center" border="0" cellpadding="5" cellspacing="1"  width="80%">
<tr>
	<th style="background-color:#C2D9FE" width="20%">รหัส</th><td> <?php echo"{$row['id_contact']}"; ?></td>
</tr>
<tr  >
	<th style="background-color:#C2D9FE">ชื่อเรื่อง</th><td><?php echo"{$row['title']}"; ?></td>
</tr>
<tr >
	<th style="background-color:#C2D9FE" >รายละเอียด</th><td><?php echo"{$row['detail']}"; ?></td>
</tr>
<tr >
	<th style="background-color:#C2D9FE" >ชื่อผู้ติดต่อ</th><td><?php echo"{$row['name']}"; ?></td>
</tr>
<tr >
	<th style="background-color:#C2D9FE" >อีเมล์</th><td><?php echo"{$row['email']}"; ?></td>
</tr>
<tr >
	<th style="background-color:#C2D9FE" >อีเมล์</th><td><?php echo "{$row['time']}"; ?></td>
</tr>
<tr >
  </tr>
</table>


 

 
 </html>

  
    
    