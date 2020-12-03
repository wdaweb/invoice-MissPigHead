<?php
include_once "../base.php";
$sql="SELECT * FROM `invoice` WHERE `id`='{$_POST['id']}' && `user_id`='{$_SESSION['id']}'";
$rows=selectSQL($sql);
$_SESSION['selectedInv']=$rows[0];
// print_r($_POST);
go("../index.php?do=edit_invoice");
?>