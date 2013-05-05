<?php include('../config.inc');
$ID_Ca = $_POST['ID_Ca'] ;
$Na_Ca = $_POST['Na_Ca'] ;
?>
<?php 
$sql = "UPDATE bso_book_category SET  ID_Ca ='{$ID_Ca}'  , Na_Ca ='{$Na_Ca}' WHERE ID_Ca = '{$ID_Ca}' ";	
$result = mysqli_query($con, $sql);

  echo "<h3>ผลการแก้ไขหมวดหมู่</h3>\n";
  if ($result) {
    echo "แก้ไขข้อมูลสำเร็จ " ."<br>";
    echo "<a href=\"book_category_list.php\">ดูหมวดหมู่หนังสือ</a><br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการแก้ไข<br>";
  }

  mysqli_close($con);
  
?>