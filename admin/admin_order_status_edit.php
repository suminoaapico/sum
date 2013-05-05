<?php include('../config.inc');
$status = $_POST['status'] ;
$ID_Order = $_POST['ID_Order'] ;
?>
<?php 
$sql = ("UPDATE bso_order SET Status ='{$status}' 
WHERE ID_Order = '{$ID_Order}' ");	
$result = mysqli_query($con, $sql);


  echo "<h3>ผลการแก้ไข</h3>\n";
  if ($result) {
    echo "แก้ไขข้อมูลสำเร็จ " ."<br>";
    echo "<a href=\"admin_order_detail.php?ID_Order={$ID_Order}\">รายการส่งซื้อ</a><br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการแก้ไข<br>";
  }

  mysqli_close($con);
  
?>