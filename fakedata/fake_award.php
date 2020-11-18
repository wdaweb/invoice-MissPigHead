<?php
// 產生每期獎號
// 
// 資料驗證：同年同期不可出現重複發票號 => 暫不在此程式加入資料驗證

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8";
$pdo = new PDO($dsn,'root','');

for($i=19;$i<=20;$i++){  // $i for year
    for($j=1;$j<=6;$j++){ // $j for period
        $inv_number_1=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 隨機8碼
        $inv_number_2=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 隨機8碼
        $pdo->exec("insert into `awards`(`inv_number`,`payment_year`,`payment_period`,`type`) values('$inv_number_1','$i','$j','1')");
        $pdo->exec("insert into `awards`(`inv_number`,`payment_year`,`payment_period`,`type`) values('$inv_number_2','$i','$j','2')");
        // $inv_number_3=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 隨機8碼
    }}

?>