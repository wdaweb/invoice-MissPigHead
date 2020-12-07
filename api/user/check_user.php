<?php
include_once("./../../base.php");

$_SESSION['err']=[];

$sql="select * from `user` where `acc`='{$_POST['acc']}'";
$rows=querySQLall($sql);
foreach($rows as $row){} // 將該筆資料，轉成陣列

if(empty($row['acc']) || (!empty($row['acc']) && $row['acc']!==$_POST['acc'])){
  $_SESSION['err']['login']['acc']="此帳號不存在";
  go("./../../index.php?do=login");
}elseif($_POST['pw']!==$row['pw']){
  $_SESSION['err']['login']['pw']="密碼錯誤";
  go("./../../index.php?do=login");
}else{
  $_SESSION['id']=$row['id'];
  $_SESSION['acc']=$row['acc'];
  $_SESSION['role']=$row['role'];
  go("./../invoice/select_invoice_all.php");
}

?>