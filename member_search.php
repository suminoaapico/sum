<?php include('config.inc');
if (isset($_POST["send"]))
  process_form();
else
  show_form();
//ฟังก์ชั่นที่ใช้แสดงฟอร์ม
function show_form() {
  echo <<<HTMLBLOCK
<h3>พนักงาน</h3>
<form method="POST" action="{$_SERVER['PHP_SELF']}">
  ป้อนคำค้น: <input type="text" name="search" size="30"><br>
  <input type="submit" name="send" value="ค้นหา">
  </form>
HTMLBLOCK;
}

//ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
function process_form() {
  $search_term = trim($_POST["search"]);


  include('config.inc');
  $sql = "SELECT * FROM bso_member2 WHERE ID_Member  LIKE '%{$search_term}%' OR Na_Member  LIKE '%{$search_term}%'"; 
  
  // เงื่อนไขการค้นหาจากฐานข้อมูล
  $result = mysqli_query($con, $sql);  // ส่งคำสั่ง SQL ไปประมวลผลยังฐานข้อมูล
  echo "<h3 align=\"center\" >ผลการค้นหา</h3>\n";
  while ($row = mysqli_fetch_array($result)) {
	  echo"<table width=\"200\" border=\"1\" align=\"center\">";
	  echo"<tr>";
	 echo"<td colspan=\"2\" align=\"center\"><img src=\"admin/images/{$row['Im_Member']}\" alt=\"\" width=\"120\" height=\"144\" border=\"0\"></td>";
  echo"</tr>";
 echo" <tr>";
    echo"<td>&nbsp; รหัส: </td>";
    echo"<td>&nbsp; {$row['ID_Member']}</td>";
  echo"</tr>";
  echo"<tr>";
   echo" <td>ชื่อ</td>";
   echo" <td>&nbsp; {$row['Na_Member']}</td>";
  echo"</tr>";
 echo"<tr>";
   echo"<td>ที่อยุ่</td>";
    echo"<td>{$row['Ad_Member']}</td>";
 echo" </tr>";
echo"  <tr>";
 echo"   <td>เบอร์โทร</td>";
  echo"  <td>{$row['Te_Member']}</td>";
  echo"</tr>";
echo"</table>";
   echo"<br>";


  }

  mysqli_close($con);
}
?>

