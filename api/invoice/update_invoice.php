<?php

include_once "./../../base.php";

if(!preg_match("/[A-Za-z]{2}/",$_POST['code'])){$_SESSION['err']['edit_invoice']['code']="發票字軌為2位英文字母";}
if(!preg_match("/[0-9]{8}/",$_POST['num'])){$_SESSION['err']['edit_invoice']['num']="發票號碼為8位數字";}
if(strtotime($_POST['date'])>strtotime('now')){$_SESSION['err']['edit_invoice']['date']="這天還沒到哦！請重新輸入";}
if(substr(($_POST['date']),0,4)!=$_POST['year']){$_SESSION['err']['edit_invoice']['year']="請確認發票年度";}
if(substr(($_POST['date']),5,2)>($_POST['period'])*2){$_SESSION['err']['edit_invoice']['period']="請確認對獎期別";}


$sql="update invoice
    set
    `code`='{$_POST['code']}',
    `num`='{$_POST['num']}',
    `period`='{$_POST['period']}',
    `date`='{$_POST['date']}',
    `amount`='{$_POST['amount']}'
    where `id`='{$_POST['id']}'";

$chk=$pdo->exec($sql);
    $_SESSION['err']['edit_invoice']['done']="{$_POST['code']}-{$_POST['num']}更新成功";
    header("location：./../../index.php?do=edit_invoice");

?>