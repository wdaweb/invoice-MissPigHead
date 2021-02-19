<?php
// 每次產生1000筆假發票
// 2018/01/01~2020/11/30
// 5位user 的發票紀錄
// 資料驗證：同年同期不可出現重複發票號(字軌+號碼) $sql_check

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8";
$pdo = new PDO($dsn,'root','');

for($i=0;$i<10;$i++){
    $code=chr(rand(65,90)).chr(rand(65,90)); // chr(rand(65,90)) 隨機英文字母
    $num=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 隨機8碼
    $date=date('Y-m-d',rand(strtotime('01/01/2018'),strtotime('12/08/2020'))); // 依設定的區間 產出隨機日期
    $year=date('Y',strtotime($date)); // 此欄位提供資料驗證用
    $period=ceil(date('m',strtotime($date))/2);
    $amount=rand(100,150)*pow(10,rand(0,1)); 
    $type=rand(1,7);
    // $store=;
    $store=rand(3,6);
    $user_id=rand(1,4);
    $sql_insert="insert into `invoice`(`code`,`num`,`date`,`year`,`period`,`amount`,`type`,`store`,`user_id`) values('$code','$num','$date','$year','$period','$amount','$type','$store','$user_id')";
    // print_r($sql_insert);
    // echo "<hr>";
    $pdo->exec($sql_insert);
}

?>