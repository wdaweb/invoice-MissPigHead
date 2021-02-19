<?php
include_once "./../../base.php";
$sql="SELECT `invoice`.`id`,`invoice`.`code`,`invoice`.`num`,`invoice`.`date`,`invoice`.`year`,`invoice`.`amount`,`invoice`.`period`,`invoice`.`type`,`contype`.`desCH`,`invoice`.`user_id`,`store`.`name` FROM `invoice`,`store`,`contype` WHERE `contype`.`type`=`store`.`type` && `store`.`type`=`invoice`.`type` && `store`.`id`=`invoice`.`store` && `invoice`.`id`='{$_GET['id']}' && `user_id`='{$_SESSION['id']}'";
// print_r($sql);
$rows=querySQLall($sql);
// print_r($rows);
$_SESSION['selectedInv']=$rows[0];
$_SESSION['period']=$rows[0]['period'];
$periodCH=['','1月~2月','3月~4月','5月~6月','7月~8月','9月~10月','11月~12月']; // 定義：月份中文
$_SESSION['periodCH']=$periodCH; // 回傳：
// print_r($_POST);
go("./../../index.php?do=edit_invoice");
?>