<?php include('../config.inc');
if (isset($_POST["send"]))
  process_form();
else
  show_form();

//ฟังก์ชั่นที่ใช้แสดงฟอร์ม
function show_form() {
  echo <<<HTMLBLOCK
<h3>ค้นหาสมาชิก</h3>
<form method="POST" action="{$_SERVER['PHP_SELF']}">
  ค้นหาจาก: 
  <select name="searchtype">
    <option value="Na_Member" selected>ชื่อสมาขิก</option>
    <option value="ID_Member">รหัสสมาชิก</option>
  </select><br>
  ป้อนคำค้น: <input type="text" name="searchterm" size="30"><br>
  <input type="submit" name="send" value="ค้นหา">
  </form>
HTMLBLOCK;
}

//ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
function process_form() {
  $search_term = trim($_POST["searchterm"]);   // ตรวจสอบค่าที่ป้อนเข้าไป
  if ($search_term == "") {
    echo "<font color=\"red\">เกิดข้อผิดพลาด: คุณไม่ได้ป้อนคำค้น</font><br>";
    show_form();
    exit;
  }

  $search_term = addslashes($search_term);
  $search_field = $_POST["searchtype"];

  include('../config.inc');
  $sql = "SELECT * FROM bso_member WHERE {$search_field} LIKE '%{$search_term}%';"; // เงื่อนไขการค้นหาจากฐานข้อมูล
  $result = mysqli_query($con, $sql);  // ส่งคำสั่ง SQL ไปประมวลผลยังฐานข้อมูล
  echo "<h3>ผลการค้นหา</h3>\n";
  echo "จำนวนที่พบ: " . mysqli_num_rows($result) . " รายการ<br><br>\n";  // นับจำนวนแถวที่ส่งมาจาก $result
  $i = 1;
  while ($row = mysqli_fetch_array($result)) {
    echo "<b>{$i}. ชื่อ: {$row['Na_Member']}</b><br>\n";
    echo "รหัส: {$row['ID_Member']}<br>\n";
    echo "ที่อยู่: {$row['Ad_Member']}<br><br>\n";
    $i++;
  }

  mysqli_close($con);
}
?>
