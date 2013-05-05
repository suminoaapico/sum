<?php    
include('config.inc');
include('members_only.php'); 
		$user = $_SESSION["valid_user"];
		 $ID_Book = $_GET["ID_Book"];
		
		$result_2= mysqli_query($con, "SELECT * FROM bso_member WHERE Us_Member = '{$user}'  ");
		$row_2 = mysqli_fetch_array($result_2);
	  $ID = $row_2['ID_Member'] ;
	  

		$re = mysqli_query($con, "SELECT * FROM bso_basket WHERE ID_Member = '{$ID}'  AND  ID_Book = '{$ID_Book}'  ");
		$ro = mysqli_fetch_array($re);
		
	   
			if($ro['ID_Book'] == null){
				
					echo"เพื่มหนังสือได้";
					 $Number = $_GET["Number"];


$result = mysqli_query($con, "SELECT bso_member.ID_Member , bso_book.ID_Book FROM bso_member , bso_book
WHERE US_Member =  '{$user}'  AND ID_Book= '{$ID_Book}' " );
$row = mysqli_fetch_array($result);
$ID_Basket = date("Ydmhis");

$sql = "INSERT INTO bso_basket (`ID_Basket`,`ID_Book`, `ID_Member`,Number) 
VALUES ('{$ID_Basket}','{$ID_Book}', '{$row['ID_Member']}','{$Number}');";	
$result = mysqli_query($con, $sql);


  echo "<h3>ผลการเพิ่มหนังสือลงตะกร้า</h3>\n";
  if ($result) {
    echo "เพิ่มหนังสือจำนวน " .$Number. "เล่มลงในตะกร้าแล้ว<br>";
    echo "<a href=\"basket_show.php\">แสดงตะกร้าหนังสือของฉัน</a><br>";
  }
  else {
    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล<br>";
  }


//header("location:basket_show.php");

 
			}else{  
						echo"หนังสือเล่มนี้มีอยู่แล้วในตระกร้า<br>";
						$sql_1 = mysqli_query($con,"SELECT COUNT(`ID_Book`)  FROM `bso_basket` WHERE ID_Member = '{$ID}' AND  ID_Book = '{$ID_Book}' ");
					$row_1= mysqli_fetch_array($sql_1);
						echo"มีหนังสือแล้วจำนวน  ".$row_1['COUNT(`ID_Book`)'] ."เล่ม ในตระกร้า<br/>";
						echo "กรุณาใส่จำนวนหนังสือที่ท่านต้องการ";
						
						echo "<form method=\"get\" action =\"basket_process_update.php\">";
						echo" เก็บใส่ตระกร้าสินค้า: <input name = \"Number\" type =\"number\" min =\"1\" max=\"20\" value=\"1\">เล่ม ";
					echo "<input name = \"ID_Book\" type =\"hidden\" value={$ID_Book} > ";
					echo "<input name = \"User\" type =\"hidden\" value=\"{$ID}\"> ";
						echo " <input type=\"submit\" value=\"ตกลง\">";
						echo "</form>";
				}

 mysqli_close($con);
?>


