<?php
include_once "../base.php";

unset($_SESSION['err']);

$sql1="select * from `user` where `acc`='{$_POST['acc']}'";
$res=querySQLall($sql1);
if(!empty($res)){$_SESSION['err']['signup']['accused']="此帳號已被註冊";}

if(!preg_match("/[A-Za-z0-9]{4,10}/",$_POST['acc'])){$_SESSION['err']['signup']['acc']="請檢查帳號格式";}
if(!preg_match("/[A-Za-z0-9]{8,16}/",$_POST['pw'])){$_SESSION['err']['signup']['pw']="請檢查密碼格式";}
if(!preg_match("/09[0–9]{8}/",$_POST['tel'])){$_SESSION['err']['signup']['tel']="手機號碼為10位數字";}
if(!preg_match("/[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+/",$_POST['email'])){$_SESSION['err']['signup']['email']="請檢查email格式";}

if($_POST['pw']!==$_POST['pw2']){$_SESSION['err']['signup']['pw2']="請輸入相同密碼";}
if(!empty($_SESSION['err'])){go("../index.php?do=signup");}

$sql2="insert into `user`(`acc`,`pw`,`birth`,`tel`,`email`) values('".$_POST['acc']."','".$_POST['pw']."','".$_POST['birth']."','".$_POST['tel']."','".$_POST['email']."')";
$addU=querySQLall($sql2);
if($addU){
  $_SESSION['acc']=$_POST['acc'];
}else{echo "新增user失敗";}
if(!empty($_SESSION['acc'])){
  go("./index.php?do=welcome");
}

?>