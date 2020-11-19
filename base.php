<?php
$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8"; // DBname!!
$pdo = new PDO($dsn,'root','');
date_default_timezone_set("Asia/Taipei");
session_start();

function checkLen($target,$minLen,$maxLen){
    if(strlen($_POST[$target])==0){
        $_SESSION['err'][$target]="<br><span class='text-danger small'> 本欄位不得為空</span>";

    }elseif(strlen($_POST[$target])>$maxLen || strlen($_POST[$target])<$minLen){
        if($minLen==$maxLen){
        $_SESSION['err'][$target]="<br><span class='text-danger small'>本欄位長度需為".$minLen."個字</span>";

        }else{
        $_SESSION['err'][$target]="<br><span class='text-danger small'>本欄位長度需為".$minLen."~".$maxLen."個字以內</span>";

        }
    }
}

function errMsg($target){
    if(!empty($_SESSION['err'][$target])){
        print_r($_SESSION['err'][$target]);}
    }


$AwardStr=['0','頭','二','三','四','五','六'];
?>