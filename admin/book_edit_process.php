<?php include('../config.inc');
$ID_Book = $_POST['ID_Book'] ;
$Na_Book = $_POST['Na_Book'] ;
$De_Book = $_POST['De_Book'] ;
$Va_Book = $_POST['Va_Book'];
$ID_Ca = $_POST['ID_Ca'];
$Ph_Book = $_POST['Ph_Book'];
?>
<?php 
$sql = "UPDATE bso_book SET  
ID_Book='{$ID_Book}'  , Na_Book ='{$Na_Book}',De_Book ='{$De_Book}',Va_Book ='{$Va_Book}',ID_Ca ='{$ID_Ca}',Ph_Book ='{$Ph_Book}' 
WHERE ID_Book = '{$ID_Book}' ";	
$result = mysqli_query($con, $sql);

  echo "<h3>ผลการแก้ไขหมวดหมู่</h3>\n";
  if ($result) {
    echo "แก้ไขข้อมูลสำเร็จ " ."<br>";
    echo "<a href=\"book_list.php\">ดูหมวดหมู่หนังสือ</a><br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการแก้ไข<br>";
  }

  mysqli_close($con);
  
?>