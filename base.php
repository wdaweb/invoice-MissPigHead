<?php
$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8"; // DBname!!
$pdo = new PDO($dsn,'root','');
date_default_timezone_set("Asia/Taipei");
session_start();

$AwardStr=['0','頭','二','三','四','五','六'];
?>