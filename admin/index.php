<?php  include('../config.inc');
	echo "<h3>หนังสือ</h3>";
   echo '<a href="../admin/book_list.php">จัดการหนังสือ</a></br>';
   echo '<a href="../book_search.php">ค้นหาหนังสือ</a></br>';
   echo '<a href="../admin/book_category_list.php">จัดการหมวดหมู่หนังสือ</a></br>';
 
   echo"<hr/>";
   echo "<h3>สมาชิก</h3>";
   echo '<a href="../admin/admin_member_list.php">จัดการสมาชิก</a></br>';
   echo '<a href="../code/member_search.php">ค้นหาสมาชิก</a></br>';
  echo '<a href="admin_contact.php">ข้อความจากผู้ติดต่อ</a></br>';
    echo"<hr/>";
   echo "<h3>การสั่งซื้อ</h3>";
   echo '<a href="../admin/admin_order_list.php">รายการสั่งซื้อ</a></br>';
   echo '<a href="../admin/admin_payment_list.php">ดูแจ้งการจ่ายเงิน</a></br>';
 
   
?>