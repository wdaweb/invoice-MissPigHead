<?php
// 產生100萬筆假發票
// 每次連接資料庫時寫入100筆，將connection 從100萬次降為1萬次
// 資料驗證：同年同期不可出現重複發票號 => 暫不在此程式加入資料驗證

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8";
$pdo = new PDO($dsn,'root','');

for($i=0;$i<1000;$i++){
    for($j=0;$j<100;$j++){
    $inv_code=chr(rand(65,90)).chr(rand(65,90)); // chr(rand(65,90)) 隨機英文字母
    $inv_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 隨機8碼
    $payment_date=date('Y-m-d',rand(strtotime('01/01/2016'),strtotime('11/30/2020'))); // 依設定的區間 產出隨機日期
    $payment_year=date('Y',strtotime($payment_date)); // 此欄位提供資料驗證用
    $payment_period=ceil(date('m',strtotime($payment_date))/2);
    $payment_amount=rand(1,1000)*pow(10,rand(0,3)); 
    $value[$j]="'$inv_code','$inv_number','$payment_date','$payment_year','$payment_period','$payment_amount'";
}
$sql="insert into `invoices`(`inv_code`,`inv_number`,`payment_date`,`payment_year`,`payment_period`,`payment_amount`) values
($value[0]),($value[1]),($value[2]),($value[3]),($value[4]),($value[5]),($value[6]),($value[7]),($value[8]),($value[9]),
($value[10]),($value[11]),($value[12]),($value[13]),($value[14]),($value[15]),($value[16]),($value[17]),($value[18]),($value[19]),
($value[20]),($value[21]),($value[22]),($value[23]),($value[24]),($value[25]),($value[26]),($value[27]),($value[28]),($value[29]),
($value[30]),($value[31]),($value[32]),($value[33]),($value[34]),($value[35]),($value[36]),($value[37]),($value[38]),($value[39]),
($value[40]),($value[41]),($value[42]),($value[43]),($value[44]),($value[45]),($value[46]),($value[47]),($value[48]),($value[49]),
($value[50]),($value[51]),($value[52]),($value[53]),($value[54]),($value[55]),($value[56]),($value[57]),($value[58]),($value[59]),
($value[60]),($value[61]),($value[62]),($value[63]),($value[64]),($value[65]),($value[66]),($value[67]),($value[68]),($value[69]),
($value[70]),($value[71]),($value[72]),($value[73]),($value[74]),($value[75]),($value[76]),($value[77]),($value[78]),($value[79]),
($value[80]),($value[81]),($value[82]),($value[83]),($value[84]),($value[85]),($value[86]),($value[87]),($value[88]),($value[89]),
($value[90]),($value[91]),($value[92]),($value[93]),($value[94]),($value[95]),($value[96]),($value[97]),($value[98]),($value[99])";
$pdo->exec($sql);
}
?>