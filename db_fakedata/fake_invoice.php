<?php
// 每次產生1000筆假發票
// 2018/01/01~2020/11/30
// 5位user 的發票紀錄
// 資料驗證：同年同期不可出現重複發票號(字軌+號碼) $sql_check

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8";
$pdo = new PDO($dsn,'root','');

for($i=0;$i<1000;$i++){
    $i_code=chr(rand(65,90)).chr(rand(65,90)); // chr(rand(65,90)) 隨機英文字母
    $i_num=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 隨機8碼
    $i_date=date('Y-m-d',rand(strtotime('01/01/2018'),strtotime('11/30/2020'))); // 依設定的區間 產出隨機日期
    $i_year=date('Y',strtotime($i_date)); // 此欄位提供資料驗證用
    $i_period=ceil(date('m',strtotime($i_date))/2);
    $i_amount=rand(1,30)*pow(10,rand(2,3)); 
    $i_type=rand(1,8);
    $i_store=rand(1,2);
    $i_acc=rand(1,5);
    $sql_check="select * from `invoice` where `i_code`='$i_code' && `i_num`='$i_num' && `i_year`='$i_year' && `i_period`='$i_period'";
    $sql_insert="insert into `invoice`(`i_code`,`i_num`,`i_date`,`i_year`,`i_period`,`i_amount`,`i_type`,`i_store`,`i_acc`) values('$i_code','$i_num','$i_date','$i_year','$i_period','$i_amount','$i_type','$i_store','$i_acc')";
    $check=$pdo->query($sql_check)->fetch();
    if(empty($check)){
        $pdo->query($sql_insert);
    }
}

?>