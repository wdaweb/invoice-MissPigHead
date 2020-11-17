<?php
// 產生1000筆假invoice

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8"; // DBname!!
$pdo = new PDO($dsn,'root','');
date_default_timezone_set("Asia/Taipei");

$ABC=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];


for($i=0;$i<100000;$i++){
    $inv_code=$ABC[rand(0,25)].$ABC[rand(0,25)];
    $inv_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    $start_date_timestamp=strtotime('06/01/2019'); // m/d/Y set start date here
    $end_date_timestamp=strtotime('11/01/2020'); // m/d/Y set end date here
    $payment_date=date('Y-m-d',rand($start_date_timestamp,$end_date_timestamp));
    $payment_period=ceil(date('m',strtotime($payment_date))/2);
    $payment_amount=rand(1,10000)*pow(10,rand(0,3)); 
    $sql="insert into `invoices`(`inv_code`,`inv_number`,`payment_date`,`payment_period`,`payment_amount`) values('$inv_code','$inv_number','$payment_date','$payment_period','$payment_amount')";
    $reslt=$pdo->exec($sql);
}

// $inv[]=$inv_code.$inv_number;
// $flip_inv=array_flip($inv);
// $inv2=array_flip($flip_inv);
// $add_inv=array_diff($inv,$inv2);

// echo "<pre>";
// print_r($add_inv);
// echo "</pre>";


// echo "count of original array ".count($inv);
    // echo "</br>";
    // echo "count of flip array ".count(array_flip($inv));
    // echo "</br>";

// echo "</br>";
// print_r($inv);
// echo "</br>";
// echo count($inv);
// echo "</br>";
// print_r(array_flip($inv));
// echo "</br>";
// echo count(array_flip($inv));
// echo "</br>";
?>