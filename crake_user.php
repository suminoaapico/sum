        <?php include('config.inc'); 
		$us = $_GET['us_member'] ;
		$result = mysqli_query($con, "SELECT * FROM bso_member WHERE Us_Member = '{$us}'  ");
		$row = mysqli_fetch_array($result);
		?>

		<?php
         if($row['Us_Member'] == null)
		 {  echo"ว่าง";
		 
		 $sql = "INSERT INTO `bso_member`(`Us_Member`, `Pa_Member`, `Na_Member`, `Ad_Member`, `Te_Member`, `Em_Member`) VALUES ('{$us_member}','{$pa_member}','{$na_member}','{$ad_member}','{$te_member}','{$em_member}')";

$result = mysqli_query($con, $sql);

  echo "<h3>ผลการสมัคร</h3>\n";
  if ($result) {
    echo "สมัครสมาชิกสำเร็จ " ."<br>";
    
	echo "User ของคุณคือ : ".$us_member."<br>";
	echo "Password คือ : ".$pa_member."<br>";
	echo "<a href=\"login.php\">เข้าสู่ระบบ</a><br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล กรุณตรวจข้อมของท่านอีกครั้ง<br>";
  }
		 
		 }else{    
		 echo"ไม่ว่าง ไม่สามรถใช้ชื่อนี้ได้";
		 }
