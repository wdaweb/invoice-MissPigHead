<?php

include_once "base.php";

echo "<pre>";

echo "<hr>";
$where=sqlWhere('','','','2016-12-25','','');
print_r($where);

echo "<hr>";

$orderBy=sqlOrderBy('payment_amount','asc','','','','');
print_r($orderBy);

echo "<hr>";

DelSelInv('select','invoices',sqlWhere('','','','2020-01-01','',''),'');


echo "<hr>";

$a=InsUpdCoVa('AB','12345678','2020-12-31','6','88');
print_r($a);

echo "<hr>";
InsUpdInv('insert','invoices','',InsUpdCoVa('AB','12345678','2020-12-31','6','88'));
echo "</pre>";

?>