<?php
  include('../config.inc'); 
$ID_Member = $_GET["ID_Member"];
$sql = "DELETE FROM bso_member WHERE ID_Member='{$ID_Member}'";
$result = mysqli_query($con, $sql);
/*
  echo "<h3>ผลการลบ</h3>\n";
  if ($result) {
    echo "ลบหนังสือออกจากตะกร้าสำเร็จ " ."<br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการแก้ไข<br>";
  }
  mysqli_close($con);
  echo '<a href="basket_show.php">กลับไปยังตะกร้าหนังสือ</a>';
*/
  header("location:admin_member_list.php");
?>