<?php
 $number = $_GET['Number'];
 $ID_Book = $_GET['ID_Book'];
 $id_user = $_GET['User'];


include('members_only.php'); 	
$user = $_SESSION["valid_user"];
$sql = "UPDATE bso_basket SET   Number = '{$number}' WHERE ID_Member = '{$id_user}' AND ID_Book = '{$ID_Book}' ";	
$result = mysqli_query($con, $sql);

  echo "<h3>ผลการแก้ไข</h3>\n";
  if ($result) {
    echo "แก้ไขข้อมูลสำเร็จ " ."<br>";
    echo "<a href=\"basket_show.php\">ดูตะกร้าหนังสือของฉัน</a><br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการแก้ไข<br>";
  }

  mysqli_close($con);
?>