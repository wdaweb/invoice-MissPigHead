<?php

include_once "base.php";

function findInv($inv_code,$inv_number,$payment_period){
    global $pdo;
    return $pdo -> query("select * from invoices where `inv_code`='$inv_code' && `inv_number`='$inv_number' && `payment_period`='$payment_period'") -> fetch(PDO::FETCH_ASSOC); 
}

?>