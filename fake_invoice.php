<?php
// 產生1000000筆假發票
// 每次寫入100筆，將connection 從100萬次，降低為1萬次，避免timeout

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8";
$pdo = new PDO($dsn,'root','');

$ABC=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

for($i=0;$i<10000;$i++){
    for($j=0;$j<100;$j++){
        $inv_code=$ABC[rand(0,25)].$ABC[rand(0,25)];
        $inv_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        $start_date_timestamp=strtotime('06/01/2019'); // m/d/Y, set start date here
        $end_date_timestamp=strtotime('11/15/2020'); // m/d/Y, set end date here
        $payment_date=date('Y-m-d',rand($start_date_timestamp,$end_date_timestamp));
        $payment_period=ceil(date('m',strtotime($payment_date))/2);
        $payment_amount=rand(1,1000)*pow(10,rand(0,3)); 
        $value[$j]="'$inv_code','$inv_number','$payment_date','$payment_period','$payment_amount'";
    }
    $sql="insert into `invoices`(`inv_code`,`inv_number`,`payment_date`,`payment_period`,`payment_amount`) values($value[0]),($value[1]),($value[2]),($value[3]),($value[4]),($value[5]),($value[6]),($value[7]),($value[8]),($value[9]),($value[10]),($value[11]),($value[12]),($value[13]),($value[14]),($value[15]),($value[16]),($value[17]),($value[18]),($value[19]),($value[20]),($value[21]),($value[22]),($value[23]),($value[24]),($value[25]),($value[26]),($value[27]),($value[28]),($value[29]),($value[30]),($value[31]),($value[32]),($value[33]),($value[34]),($value[35]),($value[36]),($value[37]),($value[38]),($value[39]),($value[40]),($value[41]),($value[42]),($value[43]),($value[44]),($value[45]),($value[46]),($value[47]),($value[48]),($value[49]),($value[50]),($value[51]),($value[52]),($value[53]),($value[54]),($value[55]),($value[56]),($value[57]),($value[58]),($value[59]),($value[60]),($value[61]),($value[62]),($value[63]),($value[64]),($value[65]),($value[66]),($value[67]),($value[68]),($value[69]),($value[70]),($value[71]),($value[72]),($value[73]),($value[74]),($value[75]),($value[76]),($value[77]),($value[78]),($value[79]),($value[80]),($value[81]),($value[82]),($value[83]),($value[84]),($value[85]),($value[86]),($value[87]),($value[88]),($value[89]),($value[90]),($value[91]),($value[92]),($value[93]),($value[94]),($value[95]),($value[96]),($value[97]),($value[98]),($value[99])";
    $pdo->exec($sql);
}

?>