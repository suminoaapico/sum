<?php
  include('../config.inc'); 
$ID_Ca = $_GET["ID_Ca"];
$sql = "DELETE FROM bso_book_category WHERE ID_Ca='{$ID_Ca}'";
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
  header("location:book_category_list.php");
?>