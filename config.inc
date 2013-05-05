<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php   
$db_ad ="localhost";
$db_user ="root";
$db_pass="";
$db_name="bookonline";
$con = @mysqli_connect($db_ad,$db_user,$db_pass)or die ("Can not connect MySQL");
mysqli_select_db($con,$db_name)or die ("Can not connect database");
 mysql_query("set name utf8");   
         /***
        $result = mysqli_query($con,"SELECT * FROM bso_book;");
		$row = mysqli_fetch_array($result);
		echo $row[1];
		*/
 
$version = "3.0";    


##########################################################
                         ########   ตารางหนังสือ ############
$bso_bo='bso_book';
$na_bo='Na_Book';
$id_bo='ID_Book';
$va_bo='Va_Book';
$im_bo='images';
##########################################################
?>


