<?php include('../config.inc');
if (isset($_POST["send"]))
  process_form();
else
  show_form();

//ฟังก์ชั่นที่ใช้แสดงฟอร์ม
function show_form() {
  echo <<<HTMLBLOCK
<h3>เพิ่มหมวดหมู่หนังสือ</h3>
<form method="POST" action="{$_SERVER['PHP_SELF']}">
  ID_หมวดหมู่: <input type="text" name="ID_Ca" size="13" maxlength="13"><br>
  ชื่อหมวดหมู่: <input type="text" name="Na_Ca" size="13" maxlength="13"><br>
  <input type="submit" name="send" value="เพิ่มข้อมูล">
  </form>
HTMLBLOCK;
}

//ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
function process_form() {
  $ID_Ca = trim($_POST["ID_Ca"]);
  $Na_Ca = trim($_POST["Na_Ca"]);
  if (($ID_Ca == "") or ($Na_Ca == "")) {
    echo "<font color=\"red\">เกิดข้อผิดพลาด: คุณป้อนข้อมูลไม่ครบ</font><br>";
    show_form();
    exit;
  }
  $ID_Ca = addslashes($ID_Ca);
  $Na_Ca = addslashes($Na_Ca);
  include('../config.inc');
  $sql = "INSERT INTO bso_book_category (`ID_Ca`, `Na_Ca`) VALUES ('{$ID_Ca}', '{$Na_Ca}')";	
  $result = mysqli_query($con, $sql);

  echo "<h3>ผลการเพิ่มหมวดหมู่</h3>\n";
  if ($result) {
    echo "เพิ่มข้อมูลหมวดหมู่ " . mysqli_affected_rows($con) . " รายการ<br>";
    echo "<a href=\"book_category_list.php\">แสดงหมวดหมู่หนังสือทั้งหมด</a><br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล<br>";
  }

  mysqli_close($con);
}
?>
