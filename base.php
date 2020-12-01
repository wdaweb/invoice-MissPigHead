<?php
$pdo=new PDO("mysql:host=localhost;dbname=invoicesys;charset=utf8",'root','');
date_default_timezone_set("Asia/Taipei");
session_start();

function actSQL($action,$tableName,$columnValue,$whereDes){
  global $pdo;
  if(!empty($whereDes)){
    foreach($whereDes as $c => $v){
      $where[]="`$c`='$v'";
    }
    $whereDes="where ".implode("&&", $where);
  }else{
    $whereDes='';
  }
  if(!empty($columnValue)){
    foreach($columnValue as $c => $v){
      $set[]="`$c`='$v'";
      $columns[]=$c;
      $values[]=$v;
    }
    $setDes="set ".implode(",", $set);
  }else{
    $setDes='';
  }
  switch ($action){
    case 'select':
      $sql="select * from `".$tableName."` ".$whereDes;
      // print_r($sql);
      return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 'insert':
      $sql="insert into `".$tableName."`(`".implode("`,`",$columns)."`) values('".implode("','",$values)."')";  
      print_r($sql);
      // return 
      $pdo->exec($sql);
    break;
    case 'delete':
      $sql="delete from `".$tableName."` ".$whereDes;
      print_r($sql);
      // return 
      $pdo->exec($sql);
    break;
    case 'update':
      $sql="update `".$tableName." ".$setDes." ".$whereDes;
      print_r($sql);
      return $pdo->exec($sql);
    break;
  }
}

function go($url){
  header("location:".$url);
}

function checkLen($columnName,$maxLen,$minLen){
  $Len=strlen($columnName);
  if($Len<$minLen || $Len>$maxLen){
    $msg="請輸入".$minLen."~".$maxLen."字元";
    $_SESSION['err'][$columnName]['length']=$msg;
  }
}

function checkEmpty($columnName){
  if(empty($_POST[$columnName])){
    $msg="本欄位不可為空白";
    $_SESSION['err'][$columnName]['empty']=$msg;
  }
}

function errFeedBack(...$columnName){
  if(!empty($_SESSION['err']['$columnName'])){
    foreach($_SESSION['err']['$columnName'] as $k => $v){
      $_SESSION['err']['$columnName'][$k]=$v;
    }
  }
}

?>