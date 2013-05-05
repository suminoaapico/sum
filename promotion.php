<?php
include('promotion.inc');
if ($Sum<=$S1) $Di_P=$P1  ;      //  ถ้าอยู่ระหว่าง  0-300 ลด 20 บาท
elseif($Sum<=$S2) $Di_P=$P2;
elseif($Sum<=$S3) $Di_P=$P3;  // ถ้ามากว่า 301-500 ลด 100 บาท
elseif($Sum<=$S4) $Di_P=$P4;  // ถ้ามากว่า 501- 800 ลด 200 บาท
else $Di_P=$P5;               // ถ้ามากกว่า 800

$Di=$Di_P*$Sum;

$Dis_1 = $Sum *$Di_P;
$Dis=$Sum-$Dis_1;

?>