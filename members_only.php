<?php
include('config.inc');
session_start();

if (!isset($_SESSION["valid_user"])) {
  echo "คุณไม่มีสิทธิดูเนื้อหาในเพจนี้ เนื่องจากยังไม่ได้เข้าสู่ระบบ<br>";
  echo '<a href="login.php">เข้าสู่ระบบ</a>';
  exit;
}
?>



