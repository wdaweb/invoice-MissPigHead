<?php
// 產生1000筆假invoice

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8"; // DBname!!
$pdo = new PDO($dsn,'root','');
date_default_timezone_set("Asia/Taipei");

$code=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');


for($i=0;$i<1000000;$i++){
    $inv_code=$ABC[rand(0,25)].$ABC[rand(0,25)];
    $inv_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    $start_date_timestamp=strtotime('03/01/2020');// m/d/Y
    $end_date_timestamp=strtotime('11/01/2020');
    $payment_date=date('Y-m-d',rand($start_date_timestamp,$end_date_timestamp));
    $payment_period=ceil(date('m',strtotime($payment_date))/2);
    $payment_amount=rand(10,100000);  
    $sql="insert into `invoices`(`inv_code`,`inv_number`,`payment_date`,`payment_period`,`payment_amount`) values('$inv_code','$inv_number','$payment_date','$payment_period','$payment_amount')";
    $reslt=$pdo->exec($sql);
    $inv[]=$inv_code.$inv_number;
}
if(count($inv)!=count(array_flip($inv))){
    $t=count($inv)-count(array_flip($inv));
    for($j=0;$j<$t;$j++){
        $inv_code=$ABC[rand(0,25)].$ABC[rand(0,25)];
        $inv_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        $start_date_timestamp=strtotime('03/01/2020');// m/d/Y
        $end_date_timestamp=strtotime('11/01/2020');
        $payment_date=date('Y-m-d',rand($start_date_timestamp,$end_date_timestamp));
        $payment_period=ceil(date('m',strtotime($payment_date))/2);
        $payment_amount=rand(10,100000);  
        $sql="insert into `invoices`(`inv_code`,`inv_number`,`payment_date`,`payment_period`,`payment_amount`) values('$inv_code','$inv_number','$payment_date','$payment_period','$payment_amount')";
        $reslt=$pdo->exec($sql);
        $inv[]=$inv_code.$inv_number;
}else{
    echo "count of original array ".count($inv);
    echo "</br>";
    echo "count of flip array ".count(array_flip($inv));
    echo "</br>";
}
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