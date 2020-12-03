<?php
include_once("base.php");

$_SESSION['err']=[];

$whereDes=whereDes(whereD1('','acc',$_POST['acc'],'','',''),'','','');
print_r($whereDes);

$rows=actSQL('select','user','',$whereDes); // 資料庫叫出X筆資料
foreach($rows as $row){} // 將該筆資料，轉成陣列

if(empty($row['acc']) || (!empty($row['acc']) && $row['acc']!==$_POST['acc'])){
  $_SESSION['err']['acc']="此帳號不存在";
  go("./index.php?do=login");
}elseif($_POST['pw']!==$row['pw']){
  $_SESSION['err']['pw']="密碼錯誤";
  go("./index.php?do=login");
}else{
  $_SESSION['id']=$row['id'];
  $_SESSION['acc']=$row['acc'];
  go("./index.php?do=welcome");
}

?>