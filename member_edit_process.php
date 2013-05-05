<?php include('config.inc');

$na_member = $_POST['na_member'] ;
$ad_member = $_POST['ad_member'] ;
$te_member = $_POST['te_member'] ;
$em_member = $_POST['em_member'] ;
?>

<?php 
include('members_only.php'); 	
$user = $_SESSION["valid_user"];
$sql = "UPDATE bso_member SET  Na_Member ='{$na_member}'  , Ad_Member ='{$ad_member}', Te_Member ='{$te_member}', Em_Member = '{$em_member}' WHERE Us_Member = '{$user}' ";	
$result = mysqli_query($con, $sql);

  echo "<h3>ผลการแก้ไขโปรโฟล์</h3>\n";
  if ($result) {
    echo "แก้ไขข้อมูลสำเร็จ " ."<br>";
    echo "<a href=\"member_detail.php\">ดูโปรไฟล์ของฉัน</a><br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการแก้ไข<br>";
  }

  mysqli_close($con);
  
?>