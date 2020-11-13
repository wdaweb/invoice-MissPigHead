<?php
// 產生1000筆假invoice

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8"; // DBname!!
$pdo = new PDO($dsn,'root','');
date_default_timezone_set("Asia/Taipei");

$code=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

for ($i=0;$i<1000;$i++) {
$inv_code=$code[rand(0,25)].$code[rand(0,25)];
$inv_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
$payment_date // Y-m-d 都需要補0
$payment_period // 需要參照上面日期資訊
$payment_amount // 亂數
$pdo -> exec("insert into invoices (`inv_code`,`inv_number`) values ('$inv_code','$inv_number')");
}

?>