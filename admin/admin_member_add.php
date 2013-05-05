<?php include('../config.inc');
if (isset($_POST["send"]))
  process_form();
else
  show_form();

//ฟังก์ชั่นที่ใช้แสดงฟอร์ม
function show_form() {
  echo <<<HTMLBLOCK
<h3>เพิ่มรายชื่อสมาชิก่</h3>
<form method="POST" action="{$_SERVER['PHP_SELF']}">
 หมายเลข ID_Member: <input type="text" name="ID_Member" size="13" maxlength="13"><br>
 User: <input type="text" name="Us_Member" size="13" maxlength="13"><br>
 Password:<input type="text" name="Pa_Member" size="10" maxlength="10"><br>
 ชื่อสมาชชิก: <input type="text" name="Na_Member" size="30"><br>
 ที่อยู่: <input type="text" name="Ad_Member" size="30"><br>
 เบอร์โทร: <input type="text" name="Te_Member" size="30"><br>
 email: <input type="text" name="email" size="30"><br>
  <input type="submit" name="send" value="เพิ่มข้อมูล">
  </form>
HTMLBLOCK;
}

//ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
function process_form() {
  $ID_Member = trim($_POST["ID_Member"]);
  $Us_Member = trim($_POST["Us_Member"]); 
  $Pa_Member = trim($_POST["Pa_Member"]);
  $Na_Member = trim($_POST["Na_Member"]); 
  $Ad_Member = trim($_POST["Ad_Member"]);
  $Te_Member = trim($_POST["Te_Member"]);
  $email 	 = trim($_POST["email"]); 
  
  if (($ID_Member == "") or ($Na_Member == "") or ($Us_Member == "") or ($Pa_Member == "")) {
    echo "<font color=\"red\">เกิดข้อผิดพลาด: คุณป้อนข้อมูลไม่ครบ</font><br>";
    show_form();
    exit;
  }

  $ID_Member = addslashes($ID_Member);
  $Na_Member = addslashes($Na_Member);
  $Us_Member = addslashes($Us_Member);
  $Pa_Member = addslashes($Pa_Member);
  $Ad_Member = addslashes($Ad_Member);
  $Te_Member = addslashes($Te_Member);
  $email = addslashes($email);
  include('../config.inc');
  $sql = "INSERT INTO `bso_member`(`ID_Member`, `Na_Member`, `Ad_Member`, `Te_Member`, `Em_Member`, `Us_Member`, `Pa_Member`) VALUES ('{$ID_Member}','{$Na_Member}','{$Ad_Member}','{$Te_Member}','{$email}','{$Us_Member}','{$Pa_Member}')";	
  $result = mysqli_query($con, $sql);

  echo "<h3>ผลการสมัครสมาชิก</h3>\n";
  if ($result) {
    echo "เพิ่มสมาชิกฐานข้อมูลจำนวน " . mysqli_affected_rows($con) . " รายการ<br>";
    echo "<a href=\"admin_member_list.php\">แสดงรายการชื่อสมาชิกทั้งหมด</a><br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการเพิ่รหัสสมาชิกหรื่อชื่อสมาชิกอาจมีอยู่แล้ว<br>";
  }

  mysqli_close($con);
}
?>
