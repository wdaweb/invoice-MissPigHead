<?php
include_once "./../../base.php";

if(!preg_match("/[A-Za-z]{2}/",$_POST['code'])){$_SESSION['err']['add_invoice']['code']="發票字軌為2位英文字母";}
if(!preg_match("/[0-9]{8}/",$_POST['num'])){$_SESSION['err']['add_invoice']['num']="發票號碼為8位數字";}
if(strtotime($_POST['date'])>strtotime('now')){$_SESSION['err']['add_invoice']['date']="這天還沒到哦！請重新輸入";}
if(substr(($_POST['date']),0,4)!=$_POST['year']){$_SESSION['err']['add_invoice']['year']="請確認發票年度";}
if(substr(($_POST['date']),5,2)>($_POST['period'])*2){$_SESSION['err']['add_invoice']['period']="請確認對獎期別";}

if(empty($_SESSION['err'])){
$sql="insert into `invoice`(`code`, `num`, `date`, `year`, `period`, `amount`, `type`,`user_id`) values('{$_POST['code']}','{$_POST['num']}','{$_POST['date']}','{$_POST['year']}','{$_POST['period']}','{$_POST['amount']}','{$_POST['type']}','{$_SESSION['id']}')";
execSQLall($sql);
if(!empty($_POST['store'])){
  $sql2="insert into `store`(`name`,`type`) values('{$_POST['store']}','{$_POST['type']}')";
  execSQLall($sql2);
}
$_SESSION['err']['add_invoice']['done']="{$_POST['code']}-{$_POST['num']}新增成功";
}

go("./../../index.php?do=add_invoice");

?>