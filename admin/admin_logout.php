<?php
session_start();
include('../config.inc');
if (isset($_SESSION["valid_user"])) {
  session_destroy();
  echo "ออกจากระบบแล้ว<br>";
  echo '<a href="login.php">เข้าสู่ระบบ</a><hr>';
}
else {
  echo "คุณยังไม่ได้เข้าสู่ระบบ จึงไม่มีความจำเป็นต้องออกจากระบบ<br>";
  echo '<a href="login.php">เข้าสู่ระบบ</a><hr>';
}

echo '<a href="members_only.php">ไปยังเพจ members_only.php</a>';
?>
