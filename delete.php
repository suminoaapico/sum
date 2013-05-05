<?php
include('members_only.php');  include('../config.inc'); 
$ID_Basket = $_GET["ID_Basket"];
$sql = "DELETE FROM bso_basket WHERE ID_Basket='{$ID_Basket}'";
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
  header("location:basket_show.php");
?>