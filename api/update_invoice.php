<?php

include_once "../base.php";

$sql="update invoices
    set
    `inv_code`='{$_POST['inv_code']}',
    `inv_number`='{$_POST['inv_number']}',
    `payment_period`='{$_POST['payment_period']}',
    `payment_date`='{$_POST['payment_date']}',
    `payment_amount`='{$_POST['payment_amount']}'
    where `id`='{$_POST['id']}'";

$chk=$pdo->exec($sql);
if($chk){
    header("location：../index.php?do=invoice_list");
}else{echo "check again";}

?>