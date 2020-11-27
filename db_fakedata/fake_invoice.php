<?php
// 每次產生1000筆假發票
// 2018/01/01~2020/11/30
// 5位user 的發票紀錄
// 資料驗證：同年同期不可出現重複發票號(字軌+號碼) $sql_check

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8";
$pdo = new PDO($dsn,'root','');

for($i=0;$i<1000;$i++){
    $code=chr(rand(65,90)).chr(rand(65,90)); // chr(rand(65,90)) 隨機英文字母
    $num=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 隨機8碼
    $date=date('Y-m-d',rand(strtotime('01/01/2018'),strtotime('11/30/2020'))); // 依設定的區間 產出隨機日期
    $year=date('Y',strtotime($date)); // 此欄位提供資料驗證用
    $period=ceil(date('m',strtotime($date))/2);
    $amount=rand(10,80)*pow(10,rand(0,2)); 
    $type=rand(1,9);
    $store=rand(1,2);
    $acc=rand(1,5);
    $sql_check="select * from `invoice` where `code`='$code' && `num`='$num' && `year`='$year' && `period`='$period'";
    $sql_insert="insert into `invoice`(`code`,`num`,`date`,`year`,`period`,`amount`,`type`,`store`,`acc`) values('$code','$num','$date','$year','$period','$amount','$type','$store','$acc')";
    $check=$pdo->query($sql_check)->fetch();
    if(empty($check)){
        $pdo->query($sql_insert);
    }
}

?>