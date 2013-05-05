<?php
include('../config.inc');
session_start();

if (!isset($_SESSION["valid_user"])) {
  echo "คุณไม่มีสิทธิดูเนื้อหาในเพจนี้ เนื่องจากยังไม่ได้เข้าสู่ระบบ<br>";
  echo '<a href="../login.php">เข้าสู่ระบบ</a>';
  exit;
}
$user =  $_SESSION["valid_user"];

if ($user!='admin') {
   echo"คุณเข้าสู่ระรบบในชื่อ $user <br>";
  echo "คุณต้องเข้าสู่ระบบในชื่อผู้ดูและระบบ<br>";
  echo '<a href="../logout.php">ออกจากระบบ</a>';
  exit;
}

?>


