<?php
//撰寫新增消費發票的程式碼
//將發票的號碼及相關資訊寫入資料庫
session_start();

include_once "../base.php";

$sql="insert into invoices (`".implode("`,`",array_keys($_POST))."`) values('".implode("','",$_POST)."')";

if(empty($_SESSION['err'])){
    header ("location:../index.php?do=invoice_list");
}else{
    header ("location:../index.php");
}

?>