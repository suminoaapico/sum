<?php
session_start();
include('../config.inc');
if (isset($_SESSION["valid_user"])) {
  echo "คุณได้เข้าสู่ระบบแล้ว จึงไม่มีความจำเป็นต้องล็อกอินอีก<br>";
  echo '<a href="admin_logout.php">ออกจากระบบ</a><hr>';
}
else {
  if (isset($_POST["send"]))
    process_form();
  else
    show_form();
}

//ฟังก์ชั่นที่ใช้แสดงฟอร์ม
function show_form() {
  echo <<<HTMLBLOCK
<h3>ผู้ดูและระบบเข้าสู่ระบบ</h3>
<form method="POST" action="{$_SERVER['PHP_SELF']}">
  ชื่อผู้ใช้: <input type="text" name="uname"><br>
  รหัสผ่าน: <input type="password" name="passwd"><br>
  <input type="submit" name="send" value="เข้าสู่ระบบ">
</form>
HTMLBLOCK;
}

//ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
function process_form() {
  $user = trim($_POST["uname"]);
  $pass = trim($_POST["passwd"]);

  if (($user != "") && ($pass != "")) {
    if (validate_user($user, $pass)) {
      $_SESSION["valid_user"] = $user;

      echo "<h3>ยินดีต้อนรับคุณ $user</h3>";
      echo "คุณได้เข้าสู่ระบบแล้ว<br>";
      echo '<a href="members_only.php">ไปยังเพจ members_only.php</a><br>';
	  echo '<a href="index.php">index</a><br>';
      echo '<a href="logout.php">ออกจากระบบ</a>';
    }
    else {
      echo '<font color="red">ชื่อผู้ใช้และ/หรือรหัสผ่านไม่ถูกต้อง</font>';
      show_form();
    }
  }
  else {
    echo '<font color="red">คุณยังไม่ได้ป้อนชื่อผู้ใช้และ/หรือรหัสผ่าน</font>';
    show_form();
  }
}

//ฟังก์ชั่นที่ใช้ตรวจสอบชื่อผู้ใช้และรหัสผ่าน ซึ่งจะถูกเรียกใช้ในฟังก์ชั่น process_form
function validate_user($u, $p) {
  $cn = @mysqli_connect($db_ad,$db_user,$db_pass);
  if (!$cn) {
    echo "ไม่สามารถเชื่อมต่อกับ MySQL Server ได้<br>";
    exit;
  }
  mysqli_select_db($cn,$db_name);
  $sql = "SELECT * FROM bso_admin WHERE Ad_User='$u' AND Ad_Pass=('$p');";
  $result = mysqli_query($cn, $sql);
  $row_count = mysqli_num_rows($result);
  mysqli_close($cn);
  return $row_count;
}
?>
