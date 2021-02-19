<?php
include_once "./../../base.php";

$sql="select * from `user` where `acc`='{$_SESSION['acc']}'";
$u=querySQLall($sql);
$user=$u[0];
// print_r($u);
// print_r($user);
if(!empty($_POST)){
if(!preg_match("/[A-Za-z0-9]{8,16}/",$_POST['pw'])){$_SESSION['err']['signup']['pw']="請檢查密碼格式";}
if(strtotime($_POST['birth'])>strtotime('now')){$_SESSION['err']['signup']['birth']="這天還沒到哦！請重新輸入";}
if(!preg_match("/^09/",$_POST['tel'])||!preg_match("/[0-9]{10}/",$_POST['tel'])){$_SESSION['err']['signup']['tel']="請輸入手機號碼09開頭10位數字";}
if(!preg_match("/[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+/",$_POST['email'])){$_SESSION['err']['signup']['email']="請檢查email格式";}
}

if(!empty($_POST) && empty($_SESSION['err'])){
  $sql2="UPDATE `user` SET `pw`='{$_POST['pw']}',`birth`='{$_POST['birth']}',`tel`='{$_POST['tel']}',`email`='{$_POST['email']}' WHERE `acc`='{$_POST['acc']}'";
  execSQLall($sql2);
  $_SESSION['user']=$user;
  go("./../../index.php?do=add_invoice");
}else{
  $_SESSION['user']=$user;
  go("./../../index.php?do=edit_user");
}

?>