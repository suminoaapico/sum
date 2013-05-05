<?php

$db_ad ="localhost";
$db_user ="root";
$db_pass="";
$db_name="bookonline";
$con = @mysqli_connect($db_ad,$db_user,$db_pass)or die ("Can not connect MySQL");
mysqli_select_db($con,$db_name)or die ("Can not connect database");

$sql = "delete from bso_basket where ID_Member='2'";
$result=mysqli_query($con,$sql);

// $sql="DELETE FROM $tbl_name WHERE id='$id'";
// $result=mysql_query($sql);


if ($result) {
echo "<h3>ลบแล้ว!!</h3>";
echo "[ <a href=com_show.php>Back</a> ] ";
} else {
echo "<h3>ERROR </h3>";
}
mysqli_close();
?>