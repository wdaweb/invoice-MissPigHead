<?php
include_once "./../../base.php";

$sql1="select * from `user` where `acc`='{$_POST['acc']}'";
$res=querySQLall($sql1);
if(!empty($res)){$_SESSION['err']['signup']['accused']="此帳號已被註冊";}
if(!preg_match("/[A-Za-z0-9]{4,10}/",$_POST['acc'])){$_SESSION['err']['signup']['acc']="請檢查帳號格式";}
if(!preg_match("/[A-Za-z0-9]{8,16}/",$_POST['pw'])){$_SESSION['err']['signup']['pw']="請檢查密碼格式";}
if(strtotime($_POST['birth'])>strtotime('now')){$_SESSION['err']['signup']['birth']="這天還沒到哦！請重新輸入";}
if(!preg_match("/^09/",$_POST['tel'])||!preg_match("/[0-9]{10}/",$_POST['tel'])){$_SESSION['err']['signup']['tel']="請輸入手機號碼09開頭10位數字";}
if(!preg_match("/[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+/",$_POST['email'])){$_SESSION['err']['signup']['email']="請檢查email格式";}
if($_POST['pw']!==$_POST['pw2']){$_SESSION['err']['signup']['pw2']="請輸入相同密碼";}

if(!empty($_SESSION['err'])){go("../index.php?do=signup");}else{
$sql2="insert into `user`(`acc`,`pw`,`birth`,`tel`,`email`) values('".$_POST['acc']."','".$_POST['pw']."','".$_POST['birth']."','".$_POST['tel']."','".$_POST['email']."')";
$addU=querySQLall($sql2);
$_SESSION['acc']=$_POST['acc'];
go("./../../index.php?do=add_invoice");
}
?>